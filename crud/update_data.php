<?php  
	include_once('connection.php'); 

	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$prodi = $_POST['prodi'];
	$fakultas = $_POST['fakultas'];

	$getdata = mysqli_query($koneksi,"SELECT * FROM tb_mahasiswa WHERE nim ='$nim'"); 
	$rows = mysqli_num_rows($getdata);

	$respose = array();

	if($rows > 0 )
	{
		$query = "UPDATE tb_mahasiswa SET nama='$nama',prodi='$prodi',fakultas='$fakultas' WHERE nim='$nim'";
		$exequery = mysqli_query($koneksi,$query);
		if($exequery)
		{
				$respose['code'] =1;
				$respose['message'] = "Update Success";
		}
		else
		{
				$respose['code'] =0;
				$respose['message'] = "Failed Update";
		}
	}
	else
	{
				$respose['code'] =0;
				$respose['message'] = "Failed Update : data tidak ditemukan";
	}
	
	echo json_encode($respose);
?>