<div>
    <div x-data="sqlBuilder()" x-init="init()" x-on:tables-updated.window="updateQueryBuilder(event.detail[0].attr)">
        <label class="mb-1" for="tables">{{ __('Pick Tables') }}</label>
        <select 
            id="tables" 
            name="tables" 
            wire:model.live.debounce.250ms="sql.tables" 
            multiple 
            class="form-select"
        >
            @foreach($tablenames as $table)
                <option value="{{ $table }}">{{ $table }}</option>
            @endforeach
        </select>

        <div x-cloak class="mt-3">
            <div class="form-check form-check-inline" x-show="$wire.sql.tables.length">
                <input class="form-check-input" type="checkbox" id="attributes" x-model="$wire.settings.attributes" x-on:click="$wire.sql.attrs = []">
                <label class="form-check-label" for="attributes">{{ __('Filter Attributes') }}</label>
            </div>
            <div class="form-check form-check-inline" x-show="$wire.sql.tables.length">
                <input class="form-check-input" type="checkbox" id="rows" x-model="$wire.settings.rows" x-on:click="$wire.sql.rules = []">
                <label class="form-check-label" for="rows">{{ __('Filter Rows') }}</label>
            </div>
            <div class="form-check form-check-inline" x-show="$wire.sql.tables.length">
                <input class="form-check-input" type="checkbox" id="expert" x-model="$wire.settings.expert">
                <label class="form-check-label" for="expert">{{ __('Expert') }}</label>
            </div>
            <div class="form-check form-check-inline" x-show="$wire.sql.tables.length">
                <input class="form-check-input" type="checkbox" id="showsql" x-model="$wire.settings.showsql">
                <label class="form-check-label" for="showsql">{{ __('Show SQL') }}</label>
            </div>
        </div>

        <div class="mt-3 mb-1" x-cloak x-show="$wire.sql.tables.length && $wire.settings.attributes">
            <label for="attr">{{ __('Pick Attribute') }}</label>
            <select 
                id="attr" 
                name="attributes" 
                x-model="$wire.sql.attrs" 
                multiple 
                class="form-select"
                wire:model="sql.attrs"
            >
                <template x-for="attribute in $wire.attr" :key="attribute">
                    <option :value="attribute" x-text="attribute"></option>
                </template>
            </select>
        </div>

        <div class="mt-3 mb-1" wire:ignore x-cloak x-show="$wire.sql.tables.length && $wire.settings.rows">
            <label for="rules">{{ __('Filter Rows') }}</label>
            <div id="query-builder"></div>
        </div>

        <div class="form-check" x-cloak x-show="$wire.sql.tables.length && $wire.settings.expert">
            <input class="form-check-input" type="checkbox" id="distinct" x-model="$wire.sql.distinct" wire:model="sql.distinct">
            <label class="form-check-label" for="distinct">{{ __('Distinct') }}</label>
        </div>

        <div class="row mt-3" x-cloak x-show="$wire.sql.tables.length && $wire.settings.expert">
            <div class="col-auto">
                <label for="orderByAttr">{{ __('Order By') }}</label>
            </div>
            <div class="col">
                <select 
                    id="orderByAttr" 
                    x-model="$wire.sql.orderBy.attr" 
                    class="form-select"
                    wire:model="sql.orderBy.attr"
                >
                    <option value="">{{ __('Select Attribute') }}</option>
                    <template x-for="attribute in $wire.attr" :key="attribute">
                        <option :value="attribute" x-text="attribute"></option>
                    </template>
                </select>
            </div>
            <div class="col">
                <select 
                    id="orderByDirection" 
                    x-model="$wire.sql.orderBy.direction" 
                    class="form-select"
                    wire:model="sql.orderBy.direction"
                >
                    <option value="">{{ __('Select Direction') }}</option>
                    <option value="ASC">{{ __('ascending') }}</option>
                    <option value="DESC">{{ __('descending') }}</option>
                </select>
            </div>
        </div>

        <div class="row mt-3" x-cloak x-show="$wire.sql.tables.length && $wire.settings.expert">
            <div class="col-auto">
                <label for="groupBy">{{ __('Group By') }}</label>
            </div>
            <div class="col">
                <select 
                    id="groupBy" 
                    x-model="$wire.sql.groupBy" 
                    class="form-select"
                    wire:model="sql.groupBy"
                >
                    <option value="">{{ __('Select Attribute') }}</option>
                    <template x-for="attribute in $wire.attr" :key="attribute">
                        <option :value="attribute" x-text="attribute"></option>
                    </template>
                </select>
            </div>
        </div>

        <pre
            wire:ignore
            class="hljs language-sql mt-3 mb-0 card-body"
            x-cloak x-show="$wire.settings.showsql"
            x-text="query"
            x-ref="query"
        ></pre>

        <button 
            x-bind:disabled="!$wire.query"
            wire:loading.attr="disabled"
            x-on:click="$wire.getResult()" 
            class="btn btn-primary w-100 mt-3"
        >
            <span wire:loading.remove wire:target="getResult">{{ __('Run') }}</span>
            <span wire:loading wire:target="getResult">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                {{ __('Loading...') }}
            </span>
        </button>

        @include('admin.partials.result-alert')

        @include('admin.partials.result-table')
    </div>


<script>
function sqlBuilder() {
    return {
        queryBuilder: null,
        queryRules: {},

        init() {
            this.initQueryBuilder();

            this.$nextTick(() => {
                document.addEventListener('queryChanged', (event) => {
                    this.queryRules = this.$wire.sql.rules = event.detail;
                });
            });
        },

        initQueryBuilder() {
            this.queryBuilder = new QueryBuilder('query-builder');
        },

        updateQueryBuilder(attr) {
            if (this.queryBuilder) {
                const updatedAttributes = attr;
                this.queryBuilder.setFields(updatedAttributes);
            }
        },

        get query() {            
            this.$wire.query = this.buildQuery();
            return this.$wire.query;
        },

        buildQuery() {
            if(! this.$wire.sql.tables.length) {
                return null;
            }

            let sql = "SELECT ";
            
            // DISTINCT
            if (this.$wire.sql.distinct) sql += "DISTINCT ";

            // SELECT
            if (this.$wire.sql.attrs.length) {
                for (let attr of this.$wire.sql.attrs) {
                    if (this.$wire.sql.groupBy && this.$wire.sql.groupBy != attr) {
                        sql += `COUNT(${attr}) AS 'COUNT ${attr}', `;
                    } else {
                        sql += `${attr}, `;
                    }
                }
                sql = sql.slice(0, -2);
            } else {
                sql += "*";
            }
            sql += "\n";

            // FROM
            sql += "FROM ";
            for (let table of this.$wire.sql.tables) {
                sql += `${table}, `;
            }
            sql = sql.slice(0, -2);
            sql += "\n";

            // WHERE
            let where = '';
            if (this.$wire.sql.rules && Object.keys(this.$wire.sql.rules).length > 0) {
                where = this.parseQuery(this.$wire.sql.rules);
            }

            // JOIN
            let join = '';
            if (this.$wire.sql.tables.includes('users') && this.$wire.sql.tables.includes('photos')) join += 'AND users.id = photos.user_id\n';
            if (this.$wire.sql.tables.includes('users') && this.$wire.sql.tables.includes('follows')) join += 'AND users.id = follows.following_id\n';
            if (this.$wire.sql.tables.includes('users') && this.$wire.sql.tables.includes('likes')) join += 'AND users.id = likes.user_id\n';
            if (this.$wire.sql.tables.includes('users') && this.$wire.sql.tables.includes('comments')) join += 'AND users.id = comments.user_id\n';
            if (this.$wire.sql.tables.includes('tags') && this.$wire.sql.tables.includes('photos')) join += 'AND photos.id = tags.photo_id\n';
            if (this.$wire.sql.tables.includes('likes') && this.$wire.sql.tables.includes('photos')) join += 'AND photos.id = likes.photo_id\n';
            if (this.$wire.sql.tables.includes('comments') && this.$wire.sql.tables.includes('photos')) join += 'AND photos.id = comments.photo_id\n';
            if (this.$wire.sql.tables.includes('users') && this.$wire.sql.tables.includes('analytics')) join += 'AND users.id = analytics.user_id\n';
            if (this.$wire.sql.tables.includes('photos') && this.$wire.sql.tables.includes('analytics')) join += 'AND photos.id = analytics.photo_id\n';
            if (join.length > 3) join = join.substr(4);

            // Validate
            this.valid = !(join === '' && this.$wire.sql.tables.length > 1);

            // WHERE, JOIN
            if (!where) {
                if (join) sql += 'WHERE ' + join;
            } else {
                if (!join) {
                    sql += 'WHERE ' + where;
                } else {
                    sql += 'WHERE (' + where + ') AND ' + join;
                }
            }

            // GROUP BY
            if (this.$wire.sql.groupBy) {
                sql += "GROUP BY " + this.$wire.sql.groupBy + "\n";
            }

            // ORDER BY
            if (this.$wire.sql.orderBy.attr) {
                sql += `ORDER BY ${this.$wire.sql.orderBy.attr} ${this.$wire.sql.orderBy.direction}\n`;
            }

            if (!this.valid) sql = '';

            // Syntax Highlighting
            this.$nextTick(() => {
                delete this.$refs.query.dataset.highlighted;
                hljs.highlightElement(this.$refs.query) 
            });
            
            return sql;
        },

        parseQuery(a) {
            let str = '';
            if (a.hasOwnProperty('rules')) {
                // group
                for (let index = 0; index < a.rules.length; ++index) {
                    if (a.rules[index].hasOwnProperty('field')) {
                        // it's a rule
                        if (a.rules[index].value) { // valid rule
                            let operator = '';
                            switch(a.rules[index].operator) {
                                case 'equal':
                                    operator = '=';
                                    break;
                                case 'not equal':
                                    operator = '!=';
                                    break;
                                case 'starts with':
                                    operator = 'LIKE';
                                    break;
                                case 'ends with':
                                    operator = 'LIKE';
                                    break;
                                case 'contain':
                                    operator = 'LIKE';
                                    break;
                                case 'not contain':
                                    operator = 'NOT LIKE';
                                    break;
                                case 'less':
                                    operator = '<';
                                    break;
                                case 'greater':
                                    operator = '>';
                                    break;
                                default:
                                    operator = '=';
                            }
                            let v = a.rules[index].value;

                            if (a.rules[index].operator === 'starts with') {
                                v = `"${v}%"`;
                            } else if (a.rules[index].operator === 'ends with') {
                                v = `"%${v}"`;
                            } else if (operator === 'LIKE' || operator === 'NOT LIKE') {
                                v = `"%${v}%"`;
                            } else if (isNaN(this.filterFloat(v))) {
                                v = `"${v}"`;
                            } else {
                                v = this.filterFloat(v);
                            }

                            str += `${a.rules[index].field} ${operator} ${v}\n`;

                            if (index + 1 !== a.rules.length) {
                                if (a.rules[index + 1].value) {
                                    str += a.combinator.toLowerCase() == 'and' ? 'AND ' : 'OR ';
                                }
                            }
                        }
                    } else {
                        // it's a new group
                        let group = this.parseQuery(a.rules[index]);
                        if (group) {
                            if (!str) {
                                str = group;
                            } else {
                                str += `${a.combinator.toLowerCase() == 'and' ? 'AND ' : 'OR '}(${group.replace(/\n$/, '')})`;
                            }
                        }
                    }
                }
            }
            return str;
        },

        filterFloat(value) {
            if (/^(\-|\+)?([0-9]+(\,[0-9]+)?|Infinity)$/.test(value))
                value = value.replace(",", ".");
            if (/^(\-|\+)?([0-9]+(\.[0-9]+)?|Infinity)$/.test(value))
                return Number(value);
            return NaN;
        },
    }
}

class QueryBuilder {
    constructor(containerId) {
        this.container = document.getElementById(containerId);
        this.fields = [];
        this.init();
        this.setupEventListeners();
    }

    init() {
        this.addGroup(this.container);
    }

    setFields(newFields) {
        this.fields = newFields;
        this.container.innerHTML = ''; // Remove all existing groups
        this.init(); // Reset the entire query builder
    }

    setupEventListeners() {
        this.container.addEventListener('click', () => {
            this.emitChange();
        });

        this.container.addEventListener('input', () => {
            this.emitChange();
        });
    }

    emitChange() {
        const event = new CustomEvent('queryChanged', {
            detail: this.getQueryObject(),
            bubbles: true
        });
        this.container.dispatchEvent(event);
    }

    addGroup(container) {
        const group = document.createElement('div');
        group.className = 'rule-group mb-2';

        const header = document.createElement('div');
        header.className = 'd-flex justify-content-between align-items-center mb-2';

        const combinatorSelect = this.createSelect([
            { label: '{{ __("Fulfill all conditions") }}', value: 'AND' },
            { label: '{{ __("Fulfill at least one condition") }}', value: 'OR' }
        ], 'btn btn-sm btn-outline-primary dropdown-toggle');
        const addRuleBtn = this.createButton('{{ __("Add Rule") }}', 'btn-sm btn-outline-success', () => this.addRule(group));
        const addGroupBtn = this.createButton('{{ __("Add Group") }}', 'btn-sm btn-outline-success', () => this.addGroup(group));
        const deleteBtn = this.createButton('{{ __("Delete Group") }}', 'btn-sm btn-outline-danger', () => container.removeChild(group));

        header.appendChild(combinatorSelect);
        const btnGroup = document.createElement('div');
        btnGroup.className = 'btn-group';
        btnGroup.appendChild(addRuleBtn);
        btnGroup.appendChild(addGroupBtn);
        btnGroup.appendChild(deleteBtn);
        header.appendChild(btnGroup);

        group.appendChild(header);
        container.appendChild(group);

        this.addRule(group);
    }

    addRule(container) {
        const rule = document.createElement('div');
        rule.className = 'd-flex align-items-center mb-2';

        const fieldSelect = this.createSelect(this.fields, 'form-select me-2');
            const operatorSelect = this.createSelect([
            { label: '{{ __("equals") }}', value: 'equal' },
            { label: '{{ __("does not equal") }}', value: 'not equal' },
            { label: '{{ __("less") }}', value: 'less' },
            { label: '{{ __("greater") }}', value: 'greater' },
            { label: '{{ __("contains") }}', value: 'contain' },
            { label: '{{ __("does not contain") }}', value: 'not contain' },
            { label: '{{ __("starts with") }}', value: 'starts with' },
            { label: '{{ __("ends with") }}', value: 'ends with' },
        ], 'form-select me-2');
        const valueInput = document.createElement('input');
        valueInput.type = 'text';
        valueInput.className = 'form-control me-2';
        const deleteBtn = this.createButton('{{ __("Delete") }}', 'btn btn-outline-danger', () => container.removeChild(rule));

        rule.appendChild(fieldSelect);
        rule.appendChild(operatorSelect);
        rule.appendChild(valueInput);
        rule.appendChild(deleteBtn);

        container.appendChild(rule);
    }

    createSelect(options, className) {
        const select = document.createElement('select');
        select.className = className;
        options.forEach(option => {
            const opt = document.createElement('option');
            opt.textContent = typeof option === 'object' ? option.label : option;
            opt.value = typeof option === 'object' ? option.value : option.toLowerCase();
            select.appendChild(opt);
        });
        return select;
    }

    createButton(text, className, onClick) {
        const button = document.createElement('button');
        button.textContent = text;
        button.className = `btn ${className}`;
        button.onclick = onClick;
        return button;
    }

    getQueryObject() {
        return this.serializeGroup(this.container.firstChild);
    }

    serializeGroup(groupElement) {
        const combinator = groupElement.querySelector('select').value;
        const rules = [];

        for (const child of groupElement.children) {
            if (child.classList.contains('rule-group')) {
                rules.push(this.serializeGroup(child));
            } else if (child.classList.contains('d-flex') && !child.classList.contains('justify-content-between')) {
                const [field, operator, value] = child.querySelectorAll('select, input');
                rules.push({
                    field: field.value,
                    operator: operator.value,
                    value: value.value
                });
            }
        }

        return { combinator, rules };
    }
}
</script>

<style>
    .rule-group {
        border: var(--bs-card-border-width) solid var(--bs-card-border-color);
        border-radius: var(--bs-card-border-radius);
        padding: 0.25rem;
    }

    .rule-group > * {
        margin-left: 1rem;
    }

    .rule-group > *:first-child {
        margin-left: 0;
    }
</style>

<style>
    #table {
        transform: rotateX(180deg);
    }

    #table > table {
        transform: rotateX(180deg);
    }
</style>
</div>