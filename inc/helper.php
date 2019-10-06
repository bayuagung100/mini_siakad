<?php

// kumpulan fungsi-fungsi yang sering digunakan
function base_url($var){
    // $url = sprintf("%s://%s%s", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', $_SERVER['SERVER_NAME'], $_SERVER['REQUEST_URI']);
    $url = "http://localhost/mini_siakad/".$var;
    return $url;
}

function buka_tabel($judul){
	echo'
    <table id="example1" class="table table-bordered table-striped">
		<thead>
            <tr>
                <th style="width: 10px">No</th>';
	foreach($judul as $jdl){
        echo '
                <th>'.$jdl.'</th>';
	}
				
        echo '
                <th style="width: 90px">Aksi</th>
			</tr>
		</thead>
		<tbody>';
}

function isi_tabel($no, $data, $link, $link2, $id, $edit=true, $hapus=true){
	echo'
        <tr>
        <td>'.$no.'</td>';
	foreach($data as $dt){
		echo'<td>'.$dt.'</td>';
	}
	echo'<td>';
	if($edit){
		echo'<a href="'.$link.'&id='.$id.'" class="btn btn-primary">
				<i class="fa fa-edit"></i>
			</a> ';
	}
	if($hapus){
		echo'<a href="'.$link2.'&id='.$id.'" class="btn btn-danger">
				<i class="fa fa-trash"></i>
			</a>';
	}
	echo'</td>
		</tr>';
}

function tutup_tabel($title){
    echo'
        </tbody>
        <tfoot>
            <tr>
            <th style="width: 10px">No</th>';
    foreach($title as $ttl){
        echo '
                <th>'.$ttl.'</th>
        ';
    }
    echo '
                <th style="width: 90px">Aksi</th>
			</tr>
    </table>
    ';
}

function buka_form($link,$id, $aksi)
{
    echo'
        <form method="post" action="'.$link.'" role="form" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="'.$id.'">
            <input type="hidden" name="aksi" value="'.$aksi.'">
    ';

}

function text_form($label, $nama, $nilai, $tipe="text")
{
    echo '
            <!-- text input -->
            <div class="form-group">
                <label for="'.$nama.'">'.$label.'</label>
                <input type="'.$tipe.'" id="'.$nama.'" name="'.$nama.'" class="form-control" value="'.$nilai.'">
            </div>
    ';
}

function textarea_form($label, $nama, $nilai)
{
    echo '
            <div class="form-group">
                <label for="'.$nama.'">'.$label.'</label>
                <textarea id="'.$nama.'" name="'.$nama.'" value="'.$nilai.'" class="form-control" rows="3" ></textarea>
            </div>
    ';
}

function genre_form($label, $nama)
{
    echo '
        <div class="form-group">
            <label>'.$label.'</label>
            <select class="form-control" name="'.$nama.'">
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
    ';
}
function image_form($label, $nama, $nilai)
{
    echo '
        <div class="form-group">
            <label for="'.$nama.'">'.$label.'</label>
            <input type="file" id="'.$nama.'" name="'.$nama.'" value="'.$nilai.'">
            <p class="help-block">Format yang didukung: .jpeg, .jpg, .png</p>
        </div>
    ';
}


function tutup_form($link){
    echo'
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">
                <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                <a class="btn btn-warning" href="'.$link.'">
					<i class="glyphicon glyphicon-arrow-left"></i> Batal 
				</a>
            </div>
        </form>
    ';
}
?>
