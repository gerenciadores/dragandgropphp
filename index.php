<?php
require_once "ProjectManagement.php";

$projectName = "StartTuts";
$projectManagement = new ProjectManagement();
$statusResult = $projectManagement->getAllStatus();
?>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gerenciadores</title>
 <meta name="keywords" content="analise e desenvolvimento de sistemas cria aplicativos">
<meta name="description" content="Desenvolvimento de sistemas, aplicativos e websites">
<meta name="author" content="Kaio Silva">
<meta name="p:domain_verify" content="8e4af3b3480dd47cfeedc2bb7a9376ff"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
<link rel="stylesheet"
    href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
body {
    font-family: 'Roboto';
    background-color: #180E33;
    color: white;
}


.status-card {
    width: 250px;
    margin-right: 8px;
    background: white;
    border-radius: 1rem;
    display: inline-block;
    vertical-align: top;
    font-size: 0.9em;
    border: none;
    padding: 2%;
    cursor: auto;
    touch-action: auto;
    color: #333333;
}

.status-card:last-child {
    margin-right: 0px;
}

.card-header {
    width: 100%;
    padding: 10px 10px 0px 10px;
    box-sizing: border-box;
    border-radius: 1rem;
    display: block;
    font-weight: bold;
}

.card-header-text {
    display: block;
}

ul.sortable {
    padding-bottom: 10px;
}

ul.sortable li:last-child {
    margin-bottom: 0px;
}

ul {
    list-style: none;
    margin: 0;
    padding: 0px;
}

.text-row {
    padding: 15px 10px;
    margin: 10px;
    background: #fff;
    box-sizing: border-box;
    border-radius: 3px;
    border-bottom: 1px solid white;
    cursor: pointer;
    font-size: 0.8em;
    white-space: normal;
    line-height: 20px;
}

.ui-sortable-placeholder {
    visibility: inherit !important;
    background: transparent;
    border: #666 2px dashed;
}

.f1{
    padding-top: 5%;
    border-radius: 1rem;
    border: none;
    border-style: none;
    text-align: center;
}

.f2{
  text-align: center;
  padding-top: 5%;

}

h1{
    font-weight: 900;
}

</style>
</head>
<body>
    <div class="f2">
        <br>
        <h1>Clique e arraste para alterar as informações</h1>

        <div class="f1">
            <?php
            foreach ($statusResult as $statusRow) {
                $taskResult = $projectManagement->getProjectTaskByStatus($statusRow["id"], $projectName);
                ?>
                <div class="status-card">
                    <div class="card-header">
                        <span class="card-header-text"><?php echo $statusRow["status_name"]; ?></span>
                    </div>
                    <ul class="sortable ui-sortable"
                        id="sort<?php echo $statusRow["id"]; ?>"
                        data-status-id="<?php echo $statusRow["id"]; ?>">
                <?php
                if (! empty($taskResult)) {
                    foreach ($taskResult as $taskRow) {
                        ?>
                
                     <li class="text-row ui-sortable-handle"
                            data-task-id="<?php echo $taskRow["id"]; ?>"><?php echo $taskRow["title"]; ?></li>
                <?php
                    }
                }
                ?>
                </ul>
                </div>
                <?php
            }
            ?>
        </div>
        </div>
    <script>
 $( function() {
     var url = 'edit-status.php';
     $('ul[id^="sort"]').sortable({
         connectWith: ".sortable",
         receive: function (e, ui) {
             var status_id = $(ui.item).parent(".sortable").data("status-id");
             var task_id = $(ui.item).data("task-id");
             $.ajax({
                 url: url+'?status_id='+status_id+'&task_id='+task_id,
                 success: function(response){
                     }
             });
             }
     
     }).disableSelection();
     } );
  </script>
</body>
</html>