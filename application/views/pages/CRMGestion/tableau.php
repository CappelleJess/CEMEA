<!DOCTYPE html>
<html>
  <head>
    <include src="./HeaderCRM.html"></include>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript">$(document).ready( function () {
    $('#table_id').DataTable();
} );</script>
  </head>
  <body>
    <main role="main">
      <div class="jumbotron">
        <div class="container">
          <form method="post">
            <div class="container" style="width: 200px;">

              <table id="table_id" class="display">
                <thead>
                  <tr>
                    <th>Référence</th>
                    <th>Nom de l'activité</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Row 1 Data 1</td>
                    <td>Row 1 Data 2</td>
                  </tr>
                  <tr>
                    <td>Row 2 Data 1</td>
                    <td>Row 2 Data 2</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>