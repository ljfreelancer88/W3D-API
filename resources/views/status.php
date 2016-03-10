<?php
/*
echo response()->json([
            'fname' => $status,
            'status' => 'Polly wants a cracker!'
            ]);
*/
$results = DB::select("SELECT * FROM `news`");
//echo '<pre>';
echo $data = response()->json($results);
//echo '</pre>';
//print_r($results);
//INSERT
DB::insert('INSERT INTO `news` (`title`, `content`) values (?, ?)', ['Cool', $data]);

//UPDATE
//DB::update("UPDATE `news` SET `title` = 'Cools' WHERE `title` = ?", ['Cool']);

//DELETE
//DB::delete("DELETE FROM `news` WHERE `id` = ?", [2]);