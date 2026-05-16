<?php
if (isset($_POST['button'])) {
    system("gpio mode 1 out");
    $a = exec("sudo python /var/www/html/pulse.py");
    echo $a;
}

if (isset($_POST['buttonow'])) {
    system("gpio mode 1 out");
    $a = exec("sudo python /var/www/html/pulsenow.py");
    echo $a;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Opendoor Jaume I</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    height: 100vh;
    font-family: 'Segoe UI', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    background: 
        linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
        url('casa.jpg') no-repeat center/cover;
}

/* CONTENEDOR */
.container {
    display: flex;
    gap: 40px;
}

/* BOTONES BASE */
.btn {
    width: 220px;
    height: 220px;
    border-radius: 50%;
    border: none;
    font-size: 28px;
    font-weight: bold;
    color: white;
    cursor: pointer;
    transition: all 0.25s ease;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* BOTÓN DELAY */
.delay {
    background: linear-gradient(145deg, #6c5ce7, #4834d4);
    box-shadow: 0 10px 25px rgba(0,0,0,0.4);
}

.delay:hover {
    transform: translateY(-5px) scale(1.05);
}

/* BOTÓN AHORA */
.now {
    background: linear-gradient(145deg, #e84118, #c23616);
    box-shadow: 0 10px 25px rgba(0,0,0,0.4);
}

.now:hover {
    transform: translateY(-5px) scale(1.05);
}

/* EFECTO CLICK */
.btn:active {
    transform: scale(0.95);
    box-shadow: inset 0 5px 15px rgba(0,0,0,0.5);
}
</style>
</head>

<body>

<form method="post">
    <div class="container">
        <button class="btn delay" name="button">DELAY</button>
        <button class="btn now" name="buttonow">AHORA</button>
    </div>
</form>

</body>
</html>
