 <?php
   session_start();

   $data = $_SESSION['data'];
   ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
       .table th,
       td {

          border: 1px solid black;
       }
    </style>
 </head>

 <body>
    <table>
       <tr>
          <th>nme</th>
          <th>email</th>
          <th>comment</th>
       </tr>

       <?php foreach ($data as $row) { ?>
          <tr>
             <td> <?php echo $row['name'];  ?> </td>

             <td> <?php echo $row['email'];  ?> </td>

             <td> <?php echo $row['comment'];  ?> </td>

          <?php  } ?>
          </tr>
    </table>

 </body>

 </html>