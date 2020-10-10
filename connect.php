<?php
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birth_date = $_POST['birth_date'];
    $country_of_birth = $_POST['country_of_birth'];
    $birth_city = $_POST['birth_city'];
    $citizenship = $_POST['citizenship'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $skype_id = $_POST['skype_id'];
    $url = $_POST['url'];
    $instagram = $_POST['instagram'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $eye_color = $_POST['eye_color'];
    $hair_color = $_POST['hair_color'];
    $type_of_body = $_POST['type_of_body'];
    $education_level = $_POST['education_level'];
    $passport_number = $_POST['passport_number'];
    $occupation_type = $_POST['occupation_type'];
    $position = $_POST['position'];
    $english_proficiency = $_POST['english_proficiency'];
    $family_status = $_POST['family_status'];
    $divorce_year = $_POST['divorce_year'];
    $kids = $_POST['kids'];
    $live_with_kids = $_POST['live_with_kids'];
    $criminal_past = $_POST['criminal_past'];
    $religion = $_POST['religion'];
    $country_1 = $_POST['country_1'];
    $country_2 = $_POST['country_2'];
    $country_3 = $_POST['country_3'];
    $country_4 = $_POST['country_4'];
    $country_5 = $_POST['country_5'];
    $country_6 = $_POST['country_6'];
    $drivers_license = $_POST['drivers_license'];
    $completion_date = $_POST['completion_date'];
    $files = [];
    for($i=0; $i < count($_FILES['files']['name']); $i++){
        $f_name = uniqid().$_FILES['files']['name'][$i];
        if(move_uploaded_file($_FILES['files']['tmp_name'][$i], "uploaded_images/".$f_name)){
            $files[] = "uploaded_images/".$f_name;
        }
    }
    $files = json_encode($files);
    

    //Database connection
	$conn = new mysqli('gator3015.hostgator.com','algolovi_alex','Tennis101!','algolovi_master');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
	$stmt = $conn->prepare("insert into dating
	(first_name,
	last_name,
	birth_date,
	country_of_birth,
	birth_city,
	citizenship,
	phone_number,
	email,
	skype_id,
	url,
	instagram,
	height,
	weight,
	eye_color,
	hair_color,
	type_of_body,
	education_level,
	passport_number,
	occupation_type,
	position,
	english_proficiency,
	family_status,
	divorce_year,
	kids,
	live_with_kids,
	criminal_past,
	religion,
	country_1,
	country_2,
	country_3,
	country_4,
	country_5,
	country_6,
	drivers_license,
	files) 
	values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

		$stmt->bind_param('sssssssssssiissssssssssssssssssssss', 
		$first_name,
		$last_name,
		$birth_date,
		$country_of_birth,
		$birth_city,
		$citizenship,
		$phone_number,
		$email,
		$skype_id,
		$url,
		$instagram,
		$height,
		$weight,
		$eye_color,
		$hair_color,
		$type_of_body,
		$education_level,
		$passport_number,
		$occupation_type,
		$position,
		$english_proficiency,
		$family_status,
		$divorce_year,
		$kids,
		$live_with_kids,
		$criminal_past,
		$religion,
		$country_1,
		$country_2,
		$country_3,
		$country_4,
		$country_5,
		$country_6,
		$drivers_license,
		$files);
		
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>