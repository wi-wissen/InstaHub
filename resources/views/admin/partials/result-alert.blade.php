<div 
    x-cloak x-show="$wire.message" 
    x-bind:class="'alert alert-' + ($wire.message ? $wire.message.type : '') + ' alert-important alert-dismissible mt-3 mb-0'"
    role="alert"
>
    <span x-text="$wire.message ? $wire.message.text : ''"></span>
    <div>
        <button @click="downloadCSV($wire.results)" type="button" class="btn-close btn-download" aria-label="Download CSV" title="Download"></button>
        <button @click="$wire.unsetResults()" type="button" class="btn-close" aria-label="Close" title="{{ __('Close') }}"></button>
    </div>
</div>

<script>
    function downloadCSV(results) {
        if (!results || results.length === 0) return;
        
        const escapeCSV = (value) => {
            if (value === null) return 'NULL';
            const str = String(value);
            if (str.includes('"') || str.includes(',') || str.includes(';') || str.includes('\n')) {
                return `"${str.replace(/"/g, '""')}"`;
            }
            return str;
        };
        
        const headers = Object.keys(results[0]);
        const csvContent = [
            headers.map(escapeCSV).join(';'),
            ...results.map(row => headers.map(key => escapeCSV(row[key])).join(';'))
        ].join('\r\n');
        
        // UTF-8 BOM for Excel
        const BOM = '\uFEFF';
        const csvContentWithBOM = BOM + csvContent;
        
        const blob = new Blob([csvContentWithBOM], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        if (link.download !== undefined) {
            const url = URL.createObjectURL(blob);
            link.setAttribute('href', url);
            link.setAttribute('download', 'data.csv');
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }
</script>

<style>
    .btn-download {
        right: 2rem !important;
        background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 36 36'%3E%3Cpath fill='%23000' d='M31 31H5a1 1 0 0 0 0 2h26a1 1 0 0 0 0-2' class='clr-i-outline clr-i-outline-path-1'/%3E%3Cpath fill='%23000' d='m18 29.48l10.61-10.61a1 1 0 0 0-1.41-1.41L19 25.65V5a1 1 0 0 0-2 0v20.65l-8.19-8.19a1 1 0 1 0-1.41 1.41Z' class='clr-i-outline clr-i-outline-path-2'/%3E%3Cpath fill='none' d='M0 0h36v36H0z'/%3E%3C/svg%3E");
        background-size: 50%;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>