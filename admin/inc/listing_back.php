<?php

function create_listingMoviesBack($movies){
  echo '<table>';
  echo '<tr>';
  echo    '<td colspan = 3>Titre</td>';
  echo    '<td colspan = 10>Contenu</td>';
  echo    '<td colspan = 3>Auteur</td>';
  echo    '<td colspan = 3>Date de création</td>';
  echo    '<td colspan = 3>Update</td>';
  echo    '<td colspan = 3>edit</td>';
  echo    '<td colspan = 3>delete</td>';
  echo    '<td colspan = 3>status</td>';
  echo '</tr>';

  foreach ($movis as $key => $movie) {
    if($key % 2 == 0){
      echo '<tr>';
    }
    else {
      echo '<tr class="success">';
    }

    echo    '<td colspan = 3>'.$movie['title'].'</td>';
    echo    '<td colspan = 10>'.substr($movie['content'], 0, 30);
            if(strlen($article['content']) > 30) { echo '(...)';}
    echo    '</td>';
    echo    '<td colspan = 3>'.$article['auteur'].'</td>';
    echo    '<td colspan = 3>'.formated_date($movie['created_at']).'</td>';
    echo    '<td colspan = 3>';
            if($movie['updated_at'] != NULL) { echo formated_date($movie['updated_at']); }
    echo    '</td>';
    echo    '<td colspan = 3><a href="edit.php?id='.$movie['id'].'"><i class="fas fa-edit"></i></a></td>';
    echo    '<td colspan = 3><a href="delete.php?id='.$movie['id'].'"><i class="fas fa-trash"></i></a></td>';
    echo    '<td colspan = 3><a href="delete.php?id='.$movie['id'].'">'.$movie['status'].'</i></a></td>';
    echo '</tr>';
  }
  echo '</table>';
}
