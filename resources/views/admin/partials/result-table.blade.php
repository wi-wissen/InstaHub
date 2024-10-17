@if(!empty($results))
    <div x-data="{ 
        getValueType(value) {
            if (value === null) return 'null';
            if (typeof value === 'string') {
                if (value.match(/^https?:\/\/[^\s]+$/)) return 'url';
                if (value.match(/^.*\.(jpg|jpeg|png|gif)$/i)) return 'image';
            }
            return 'text';
        }
    }" id="table" class="mt-3" style="overflow: auto;">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <template x-for="(_, key) in $wire.results[0]">
                        <th x-text="key"></th>
                    </template>
                </tr>
            </thead>
            <tbody>
                <template x-for="row in $wire.results">
                    <tr>
                        <template x-for="value in Object.values(row)">
                            <td>
                                <template x-if="getValueType(value) === 'null'">
                                    <code>NULL</code>
                                </template>
                                <template x-if="getValueType(value) === 'url'">
                                    <a :href="`${encodeURIComponent(value)}`" x-text="value"></a>
                                </template>
                                <template x-if="getValueType(value) === 'image'">
                                    <a :href="`/${encodeURIComponent(value)}`" x-text="value"></a>
                                </template>
                                <template x-if="getValueType(value) === 'text'">
                                    <span x-text="value"></span>
                                </template>
                            </td>
                        </template>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <style>
        #table {
            transform: rotateX(180deg);
        }

        #table > table {
            transform: rotateX(180deg);
        }
    </style>
@endif