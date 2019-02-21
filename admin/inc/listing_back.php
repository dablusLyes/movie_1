<?php

function create_listingMoviesBack($movies){
  foreach ($movis as $movie) {

    echo    '<tr>';
    echo     '<th>'.$movie['id'].'</th>';
    echo     '<th>'.$movie['title'].'</th>';
    echo     '<th>'.$movie['year'].'</th>';
    echo     '<th>'.$movie['genres'].'</th>';
    echo     '<th>'.$movie['plot'].'</th>';
    echo     '<th>'.$movie['directors'].'</th>';
    echo     '<th>'.$movie['cast'].'</th>';
    echo     '<th>'.$movie['writers'].'</th>';
    echo     '<th>'.$movie['runtime'].'</th>';
    echo     '<th>'.$movie['mpaa'].'</th>';
    echo     '<th>'.$movie['rating'].'</th>';
    echo     '<th>'.$movie['popularity'].'</th>';
    echo     '<th>'.$movie['modifed'].'</th>';
    echo     '<th>'.$movie['created'].'</th>';
    echo     '<th>';
    echo       '<button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
    echo       '<button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
    echo     '</th>';
    echo   '</tr>';
  }
  echo '</table>';
}
