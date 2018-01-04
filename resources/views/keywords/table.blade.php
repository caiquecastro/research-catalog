<table-component
    :data="{{ $keywords }}"
    table-class="table"
    sort-by="name"
    :show-filter="false"
    :show-caption="false"
>
    <table-column show="id" label="#"></table-column>
    <table-column show="name" label="Palavra Chave"></table-column>
    <table-column label="Ações" :sortable="false" :filterable="false">
        <template scope="row">
            <form :action="'/keywords/' + row.id" method="post" class="d-inline-block">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
            <a class="btn btn-warning btn-sm" :href="'/keywords/' + row.id + '/edit'">
                <i class="fas fa-edit"></i>
            </a>
        </template>
    </table-column>
</table-component>
