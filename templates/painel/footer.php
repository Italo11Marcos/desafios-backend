</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- Datatables Funcionários -->
<script>
    $(document).ready(function() {
        $('#table_funcionarios').DataTable({
            "responsive": true,
            "autoWidth": false,
            "columns": [
                    { orderable: true },
                    { orderable: true },
                    { orderable: true },
                    { orderable: true },
                    { orderable: false },
                ],
            "language": {
            processing:     "Processando...",
            search:         "Pesquisar",
            lengthMenu:     "_MENU_ resultados por página",
            info:           "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            infoEmpty:      "Mostrando 0 até 0 de 0 registros",
            infoFiltered:   "(Filtrados de _MAX_ registros)",
            infoPostFix:    "",
            loadingRecords: "Carregando...",
            zeroRecords:    "Nenhum registro encontrado",
            emptyTable:     "Nenhum registro encontrado",
            aria: {
                sortAscending:  ": Ordenar colunas de forma ascendente",
                sortDescending: ": Ordenar colunas de forma descendente"
            },
            select: {
                rows: {
                    "_": "Selecionado %d linhas",
                    "0": "Nenhuma linha selecionada",
                    "1": "Selecionado 1 linha"
                }
            },
            paginate: {
                previous: "<i class='fas fa-angle-left'>",
                next: "<i class='fas fa-angle-right'>"
            },
            }
        });
    } );
</script>
<!-- Excluir Funcionário -->
<script>
    $(document).ready(function(){
        $('.remove').click(function(){
            var id = $(this).parents("tr").attr("id");
            var input = $("#funcionario_excluir");
            input.val(id);
        });
    });
</script>
</body>
</html>