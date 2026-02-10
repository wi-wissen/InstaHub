@extends('layouts.app')

@section('content')
<div class="container" id="ad-edit" x-data="adEditor()" x-init="init()">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>
                        {{ $ad->exists ? __('Edit') : __('Create') }}
                        <b x-text="name"></b>
                    </span>
                    <a href="{{ config('hub.url') }}/werbung" class="text-muted" target="_blank">{{ __('Documentation') }}</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST"
                          action="{{ $ad->exists ? '/ads/' . $ad->id : '/ads' }}"
                          enctype="multipart/form-data">
                        @csrf
                        @if($ad->exists)
                            @method('PUT')
                        @endif

                        {{-- Name --}}
                        <div class="mb-3 row">
                            <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-10">
                                <input x-model="name" id="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name" autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Type --}}
                        <div class="mb-3 row">
                            <label for="type" class="col-md-2 col-form-label text-md-end">{{ __('Type') }}</label>
                            <div class="col-md-10">
                                <select class="form-select @error('type') is-invalid @enderror"
                                        id="type" name="type" x-model="type"
                                        @change="onTypeChange()">
                                    <option value="banner">{{ __('Banner') }}</option>
                                    <option value="photo">{{ __('Photo') }}</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">{{ __('messages.adEditor.position') }}</div>
                            </div>
                        </div>

                        {{-- Priority --}}
                        <div class="mb-3 row">
                            <label for="priority" class="col-md-2 col-form-label text-md-end">{{ __('Priority') }}</label>
                            <div class="col-md-10">
                                <input id="priority" type="text" x-model="priority"
                                       class="form-control @error('priority') is-invalid @enderror"
                                       name="priority">
                                <div class="form-text">{{ __('messages.adEditor.priority') }}</div>
                                @error('priority')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Mode Toggle (nur für gui/ai – NICHT für sql-level) --}}
                        @if($queryLevel != 'sql')
                        <div class="mb-3 row">
                            <div class="col-md-10 offset-md-2">
                                <div class="btn-group w-100" role="group">
                                    <button type="button" class="btn"
                                            :class="mode === 'simple' ? 'btn-primary' : 'btn-outline-primary'"
                                            @click="switchMode('simple')">
                                        {{ __('Simple') }}
                                    </button>
                                    <button type="button" class="btn"
                                            :class="mode === 'sql' ? 'btn-primary' : 'btn-outline-primary'"
                                            @click="switchMode('sql')">
                                        {{ __('SQL') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- ===== SIMPLE MODE (nur für gui/ai) ===== --}}
                        @if($queryLevel != 'sql')
                        <div x-show="mode === 'simple'" x-cloak>

                            {{-- URL (fest /noad) --}}
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label text-md-end">{{ __('URL') }}</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value="/noad" disabled>
                                    <div class="form-text">{{ __('messages.adEditor.url') }}</div>
                                </div>
                            </div>

                            {{-- Image Dropdown mit Thumbnails --}}
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label text-md-end">{{ __('Image') }}</label>
                                <div class="col-md-10">
                                    <div class="position-relative">
                                        <button type="button" class="form-select text-start d-flex align-items-center"
                                                @click="imageDropdownOpen = !imageDropdownOpen">
                                            <template x-if="img && availableImages.includes(img)">
                                                <span class="d-flex align-items-center">
                                                    <img :src="img" class="me-2 rounded"
                                                         :style="type === 'banner'
                                                            ? 'width: 80px; height: 28px; object-fit: cover; object-position: center;'
                                                            : 'width: 40px; height: 40px; object-fit: cover; object-position: center;'">
                                                    <span x-text="img.split('/').pop()"></span>
                                                </span>
                                            </template>
                                            <template x-if="!img || !availableImages.includes(img)">
                                                <span class="text-muted">{{ __('Choose Image') }}...</span>
                                            </template>
                                        </button>
                                        <div x-show="imageDropdownOpen" x-cloak
                                             @click.outside="imageDropdownOpen = false"
                                             class="position-absolute z-3 border rounded shadow-sm p-2 mt-1"
                                             style="width: 100%; max-height: 300px; overflow-y: auto; background: var(--bs-body-bg);">
                                            <template x-for="image in availableImages" :key="image">
                                                <div class="d-flex align-items-center p-2 rounded"
                                                     style="cursor: pointer;"
                                                     :class="{ 'bg-primary bg-opacity-10': img === image }"
                                                     @mouseenter="$el.classList.add('bg-body-secondary')"
                                                     @mouseleave="$el.classList.remove('bg-body-secondary')"
                                                     @click="selectImage(image)">
                                                    <img :src="image" class="me-2 rounded"
                                                         :style="type === 'banner'
                                                            ? 'width: 160px; height: 50px; object-fit: cover; object-position: center;'
                                                            : 'width: 80px; height: 50px; object-fit: cover; object-position: center;'">
                                                    <small x-text="image.split('/').pop()"></small>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                    @error('img')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror

                                    {{-- Bildvorschau unter dem Dropdown --}}
                                    <div x-show="img && availableImages.includes(img) && !imgError" class="mt-2">
                                        <a href="/noad" target="_blank">
                                            <img :src="img" :alt="name" class="img-thumbnail img-fluid" style="max-height: 200px;"
                                                 @@error="imgError = true"
                                                 @@load="imgError = false">
                                        </a>
                                        <div x-show="imgError" x-cloak class="alert alert-danger mt-2 py-2">
                                            {{ __('Image could not be loaded.') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Query Builder --}}
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label text-md-end">{{ __('Target Group') }}</label>
                                <div class="col-md-10">

                                    {{-- Globaler Kombinator ÜBER allen Bedingungen --}}
                                    <div x-show="conditions.length > 1" class="text-center mb-2">
                                        <select class="form-select form-select-sm w-auto d-inline-block"
                                                x-model="conditionCombinator">
                                            <option value="AND">{{ __('Fulfill all conditions') }}</option>
                                            <option value="OR">{{ __('Fulfill at least one condition') }}</option>
                                        </select>
                                    </div>

                                    {{-- Bestehende Bedingungen --}}
                                    <template x-for="(condition, index) in conditions" :key="condition._id">
                                        <div class="border rounded p-3 mb-2 position-relative">
                                            {{-- Entfernen-Button --}}
                                            <button type="button" class="btn btn-sm btn-outline-danger position-absolute top-0 end-0 m-1"
                                                    @click="removeCondition(index)">
                                                &times;
                                            </button>

                                            {{-- Geschlecht --}}
                                            <div x-show="condition.type === 'gender'">
                                                <label class="form-label fw-bold">{{ __('Gender') }}</label>
                                                <select class="form-select" x-model="condition.value">
                                                    <option value="male">{{ __('male') }}</option>
                                                    <option value="female">{{ __('female') }}</option>
                                                    <option value="diverse">{{ __('diverse') }}</option>
                                                    <option value="null">{{ __('not specified') }}</option>
                                                </select>
                                            </div>

                                            {{-- Tags --}}
                                            <div x-show="condition.type === 'tag'">
                                                <label class="form-label fw-bold">{{ __('Photo Tags') }} <small class="text-muted">({{ __('from description') }})</small></label>
                                                <template x-for="(tag, tagIndex) in condition.tags" :key="tagIndex">
                                                    <div class="input-group mb-1">
                                                        <span class="input-group-text">#</span>
                                                        <input type="text" class="form-control"
                                                               :value="tag"
                                                               @input="condition.tags[tagIndex] = $event.target.value"
                                                               :placeholder="'{{ __('e.g.') }} sommer, natur, ...'">
                                                        <button type="button" class="btn btn-outline-danger"
                                                                @click="condition.tags.splice(tagIndex, 1)"
                                                                :disabled="condition.tags.length <= 1">
                                                            &times;
                                                        </button>
                                                    </div>
                                                </template>
                                                <div class="d-flex justify-content-between align-items-center mt-1">
                                                    <button type="button" class="btn btn-sm btn-outline-success"
                                                            @click="condition.tags.push('')">
                                                        + {{ __('Tag') }}
                                                    </button>
                                                    <select x-show="condition.tags.length > 1"
                                                            class="form-select form-select-sm w-auto"
                                                            x-model="condition.combinator">
                                                        <option value="OR">{{ __('Fulfill at least one condition') }}</option>
                                                        <option value="AND">{{ __('Fulfill all conditions') }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- Gerät --}}
                                            <div x-show="condition.type === 'device'">
                                                <label class="form-label fw-bold">{{ __('Device') }}</label>
                                                <select class="form-select" x-model="condition.value">
                                                    <option value="desktop">{{ __('Desktop') }}</option>
                                                    <option value="mobile">{{ __('Mobile') }}</option>
                                                    <option value="tablet">{{ __('Tablet') }}</option>
                                                    <option value="bot">{{ __('Bot') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </template>

                                    {{-- Bedingung hinzufügen --}}
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle"
                                                data-bs-toggle="dropdown">
                                            + {{ __('Add Condition') }}
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" @click.prevent="addCondition('gender')">{{ __('Gender') }}</a></li>
                                            <li x-show="type === 'banner'"><a class="dropdown-item" href="#" @click.prevent="addCondition('tag')">{{ __('Photo Tags') }}</a></li>
                                            <li><a class="dropdown-item" href="#" @click.prevent="addCondition('device')">{{ __('Device') }}</a></li>
                                        </ul>
                                    </div>

                                    {{-- Hinweis wenn keine Bedingungen --}}
                                    <div x-show="conditions.length === 0" class="text-muted fst-italic mt-2">
                                        {{ __('Ad is always shown.') }}
                                    </div>

                                    @error('query')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror

                                    {{-- Generiertes SQL anzeigen --}}
                                    <div x-show="generatedSql" class="mt-3">
                                        <label class="form-label text-muted small">{{ __('Generated SQL') }}:</label>
                                        <pre class="hljs language-sql card-body mb-0"
                                             x-ref="generatedSqlPreview"
                                             x-text="generatedSql"
                                             x-effect="highlightGenerated()"></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- ===== SQL MODE ===== --}}
                        <div x-show="mode === 'sql'" x-cloak>

                            {{-- URL --}}
                            <div class="mb-3 row">
                                <label for="url-sql" class="col-md-2 col-form-label text-md-end">{{ __('URL') }}</label>
                                <div class="col-md-10">
                                    <input x-model="url" id="url-sql" type="text"
                                           class="form-control @error('url') is-invalid @enderror"
                                           placeholder="/noad">
                                    <div class="form-text">{{ __('messages.adEditor.url') }}</div>
                                    @error('url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Image URL --}}
                            <div class="mb-3 row">
                                <label for="img-sql" class="col-md-2 col-form-label text-md-end">{{ __('Image') }}</label>
                                <div class="col-md-10">
                                    <input x-model="img" id="img-sql" type="text"
                                           class="form-control @error('img') is-invalid @enderror"
                                           placeholder="/img/ad/sommerferien.jpg"
                                           @focus="imgInputFocused = true; imgError = false"
                                           @blur="imgInputFocused = false">
                                    <div class="form-text">{!! __('messages.adEditor.image') !!}</div>
                                    @error('img')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    {{-- Bildvorschau --}}
                                    <div x-show="img && !imgError" class="mt-2">
                                        <a :href="url" target="_blank">
                                            <img :src="img" :alt="name" class="img-thumbnail img-fluid" style="max-height: 200px;"
                                                 @@error="imgError = true"
                                                 @@load="imgError = false">
                                        </a>
                                    </div>
                                    <div x-show="imgError && !imgInputFocused" x-cloak class="alert alert-danger mt-2 py-2">
                                        {{ __('Image could not be loaded.') }}
                                    </div>
                                    <span class="fst-italic" x-show="!img">{{ __('Empty') }}</span>
                                </div>
                            </div>

                            {{-- SQL Query Editor --}}
                            <div class="mb-3 row">
                                <label for="query" class="col-md-2 col-form-label text-md-end">{{ __('SQL-Query') }}</label>
                                <div class="col-md-10">
                                    <div id="editor" class="@error('query') is-invalid @enderror">
                                        <pre x-ref="preview" class="preview hljs language-sql"></pre>
                                        <textarea
                                            x-ref="textarea"
                                            class="code"
                                            spellcheck="false"
                                        ></textarea>
                                    </div>
                                    <div class="form-text">{!! __('messages.adEditor.query') !!}</div>
                                    @error('query')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Hidden fields für Formularübermittlung --}}
                        <input type="hidden" name="url" :value="mode === 'simple' ? '/noad' : url">
                        <input type="hidden" name="img" :value="img">
                        <input type="hidden" name="query" :value="mode === 'simple' ? generatedSql : queryContent">

                        {{-- Submit --}}
                        <div class="row">
                            <div class="float-right">
                                <button type="submit" class="btn float-end"
                                        :class="'{{ $ad->exists ? 'btn-primary' : 'btn-success' }}'">
                                    {{ $ad->exists ? __('Save') : __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function adEditor() {
    let _conditionId = 0;

    return {
        // Zustand
        isEdit: {{ $ad->exists ? 'true' : 'false' }},
        mode: 'simple',
        canSwitchToSql: {{ $queryLevel != 'sql' ? 'true' : 'false' }},

        // Bild-Fehlerstatus
        imgError: false,
        imgInputFocused: false,

        // Formularfelder
        name: @js(old('name', $ad->name ?? '')),
        type: @js(old('type', $ad->type ?? 'banner')),
        priority: @js(old('priority', $ad->priority ?? '1')),
        url: @js(old('url', $ad->url ?? '/noad')),
        img: @js(old('img', $ad->img ?? '')),

        // SQL-Modus
        queryContent: @js(old('query', $ad->query ?? '')),

        // Einfacher Modus – Bedingungen
        conditions: [],
        conditionCombinator: 'AND',

        // Bild-Dropdown
        imageDropdownOpen: false,

        bannerImages: [
            '/img/ad/freizeitpark.jpg',
            '/img/ad/princess.jpg',
            '/img/ad/bergalm.jpg',
            '/img/ad/sommerferien.jpg',
            '/img/ad/brokkoli.jpg',
            '/img/ad/smoothie.jpg',
        ],
        photoImages: [
            '/img/ad/maze3.jpg',
            '/img/ad/reinehaut.jpg',
        ],

        get availableImages() {
            return this.type === 'banner' ? this.bannerImages : this.photoImages;
        },

        selectImage(src) {
            this.img = src;
            this.imageDropdownOpen = false;
        },

        // Typ-Wechsel: Tag-Bedingungen entfernen (nur bei Banner) und Bild zurücksetzen
        onTypeChange() {
            this.conditions = this.conditions.filter(c => c.type !== 'tag');
            if (!this.availableImages.includes(this.img)) {
                this.img = '';
            }
        },

        @if($queryLevel != 'sql')
        // Modus wechseln (nur wenn SQL-Modus erlaubt)
        switchMode(newMode) {
            if (newMode === this.mode) return;

            if (newMode === 'sql') {
                // Generiertes SQL in den Editor übernehmen
                this.queryContent = this.generatedSql || this.queryContent;
                this.mode = 'sql';
                this.$nextTick(() => this.initEditor());
            } else {
                this.mode = 'simple';
                // Bild zurücksetzen, wenn nicht in verfügbaren Bildern
                if (!this.availableImages.includes(this.img)) {
                    this.img = '';
                }
            }
        },
        @endif

        @if($queryLevel != 'sql')
        // Bedingungen verwalten
        addCondition(type) {
            switch(type) {
                case 'gender':
                    this.conditions.push({ _id: ++_conditionId, type: 'gender', value: 'male' });
                    break;
                case 'tag':
                    this.conditions.push({ _id: ++_conditionId, type: 'tag', tags: [''], combinator: 'OR' });
                    break;
                case 'device':
                    this.conditions.push({ _id: ++_conditionId, type: 'device', value: 'desktop' });
                    break;
            }
        },

        removeCondition(index) {
            this.conditions.splice(index, 1);
        },

        // SQL-Generierung
        get generatedSql() {
            const valid = this.conditions.filter(c => {
                if (c.type === 'gender') return !!c.value;
                if (c.type === 'tag') return c.tags && c.tags.some(t => t.trim());
                if (c.type === 'device') return !!c.value;
                return false;
            });

            // Keine Bedingungen → immer anzeigen
            if (valid.length === 0) {
                return 'SELECT id FROM users WHERE id=$user';
            }

            // Einzelne Bedingung – einfacheres SQL
            if (valid.length === 1) {
                return this.buildSingleConditionSql(valid[0]);
            }

            // Mehrere Bedingungen – Subqueries mit CASE
            const parts = valid.map(c => this.buildSubquery(c)).filter(Boolean);
            if (parts.length === 0) return 'SELECT id FROM users WHERE id=$user';

            const combinator = this.conditionCombinator;
            return 'SELECT CASE\nWHEN ' + parts.join('\n' + combinator + ' ') + '\nTHEN true ELSE false END\nFROM DUAL';
        },

        buildSingleConditionSql(condition) {
            switch(condition.type) {
                case 'gender':
                    if (condition.value === 'null') {
                        return "SELECT CASE\nWHEN gender IS NULL THEN true\nELSE false END\nFROM users\nWHERE id=$user";
                    }
                    return "SELECT CASE gender\nWHEN '" + condition.value + "' THEN true\nELSE false END\nFROM users\nWHERE id=$user";
                case 'tag': {
                    const tags = condition.tags.filter(t => t.trim());
                    if (!tags.length) return '';
                    const tagConditions = tags.map(t => "description LIKE '%" + t.trim() + "%'").join(' ' + condition.combinator + ' ');
                    return "SELECT CASE\nWHEN " + tagConditions + " THEN true\nELSE false END\nFROM photos\nWHERE id=$photo";
                }
                case 'device':
                    return "SELECT CASE\nWHEN device = '" + condition.value + "' THEN true\nELSE false END\nFROM analytics\nWHERE user_id=$user\nORDER BY id DESC\nLIMIT 1";
            }
            return '';
        },

        buildSubquery(condition) {
            switch(condition.type) {
                case 'gender':
                    if (condition.value === 'null') {
                        return "(SELECT CASE WHEN gender IS NULL THEN 1 ELSE 0 END FROM users WHERE id=$user) = 1";
                    }
                    return "(SELECT CASE gender WHEN '" + condition.value + "' THEN 1 ELSE 0 END FROM users WHERE id=$user) = 1";
                case 'tag': {
                    const tags = condition.tags.filter(t => t.trim());
                    if (!tags.length) return null;
                    const tagConditions = tags.map(t => "description LIKE '%" + t.trim() + "%'").join(' ' + condition.combinator + ' ');
                    return "(SELECT CASE WHEN " + tagConditions + " THEN 1 ELSE 0 END FROM photos WHERE id=$photo) = 1";
                }
                case 'device':
                    return "(SELECT CASE WHEN device = '" + condition.value + "' THEN 1 ELSE 0 END FROM analytics WHERE user_id=$user ORDER BY id DESC LIMIT 1) = 1";
            }
            return null;
        },

        // Syntax-Highlighting für generiertes SQL
        highlightGenerated() {
            this.$nextTick(() => {
                const el = this.$refs.generatedSqlPreview;
                if (el && this.generatedSql) {
                    el.textContent = this.generatedSql;
                    delete el.dataset.highlighted;
                    hljs.highlightElement(el);
                }
            });
        },
        @endif

        // SQL-Editor
        initEditor() {
            const textarea = this.$refs.textarea;
            const preview = this.$refs.preview;

            if (!textarea || !preview) return;

            this.$nextTick(() => {
                textarea.value = this.queryContent;
                this.mirror();
            });

            textarea.addEventListener('input', () => {
                this.queryContent = textarea.value;
                this.mirror();
            });

            textarea.addEventListener('scroll', () => {
                preview.scrollTop = textarea.scrollTop;
                preview.scrollLeft = textarea.scrollLeft;
            });

            textarea.addEventListener('keydown', (e) => {
                if (e.key === 'Tab') {
                    e.preventDefault();
                    document.execCommand('insertText', false, '  ');
                }
            });

            const resizeObserver = new ResizeObserver(() => {
                preview.style.height = textarea.offsetHeight + 'px';
            });
            resizeObserver.observe(textarea);
        },

        mirror() {
            const textarea = this.$refs.textarea;
            const preview = this.$refs.preview;

            if (!textarea || !preview) return;

            preview.textContent = textarea.value;
            delete preview.dataset.highlighted;
            hljs.highlightElement(preview);

            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
            preview.style.height = textarea.scrollHeight + 'px';
        },

        // Initialisierung
        init() {
            @if($queryLevel == 'sql')
            this.mode = 'sql';
            this.$nextTick(() => this.initEditor());
            @else
            if (this.isEdit) {
                this.mode = 'sql';
                this.$nextTick(() => this.initEditor());
            }
            @endif
        }
    };
}
</script>
@endsection
