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
* { margin: 0; padding: 0; box-sizing: border-box; }

body {
    height: 100vh;
    font-family: 'Segoe UI', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    background: 
        linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
        url('casa.jpg') no-repeat center/cover;
}

.container {
    display: flex;
    gap: 80px;
    flex-wrap: wrap;
    justify-content: center;
}

.emergency-wrapper {
    position: relative;
    width: 400px;
    aspect-ratio: 1 / 1;
    border-radius: 50%;
    background: radial-gradient(circle at top, #666, #222);
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: inset 0 5px 10px rgba(255,255,255,0.2), 0 15px 30px rgba(0,0,0,0.6);
}

.btn {
    width: 75%;
    aspect-ratio: 1 / 1;
    border-radius: 50%;
    border: 6px solid #111;
    font-size: 32px;
    font-weight: bold;
    color: white;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    transition: all 0.15s ease;
}

.delay {
    background: radial-gradient(circle at 30% 30%, #4da6ff, #0047b3);
    box-shadow: inset 0 8px 15px rgba(255,255,255,0.4), inset 0 -10px 20px rgba(0,0,0,0.7), 0 8px 15px rgba(0,0,0,0.5);
}

.now {
    background: radial-gradient(circle at 30% 30%, #3cff73, #0b7a2f);
    box-shadow: inset 0 8px 15px rgba(255,255,255,0.4), inset 0 -10px 20px rgba(0,0,0,0.7), 0 8px 15px rgba(0,0,0,0.5);
}

.btn:active {
    transform: translateY(6px) scale(0.97);
    box-shadow: inset 0 15px 25px rgba(0,0,0,0.9), inset 0 -5px 10px rgba(255,255,255,0.2);
}

.label { pointer-events: none; }

.led-ring {
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    pointer-events: none;
    opacity: 0;
}

.led-active.blue {
    opacity: 1;
    animation: ledSpinBlue 2s linear infinite;
}

.led-active.green {
    opacity: 1;
    animation: ledSpinGreen 1.2s linear infinite;
}

@keyframes ledSpinBlue {
    0% { transform: rotate(0deg); box-shadow: 0 -10px 25px #4da6ff, 0 0 10px #4da6ff; }
    50% { box-shadow: 0 10px 25px #4da6ff, 0 0 10px #4da6ff; }
    100% { transform: rotate(360deg); box-shadow: 0 -10px 25px #4da6ff, 0 0 10px #4da6ff; }
}

@keyframes ledSpinGreen {
    0% { transform: rotate(0deg); box-shadow: 0 -10px 25px #3cff73, 0 0 10px #3cff73; }
    50% { box-shadow: 0 10px 25px #3cff73, 0 0 10px #3cff73; }
    100% { transform: rotate(360deg); box-shadow: 0 -10px 25px #3cff73, 0 0 10px #3cff73; }
}

@media (max-width: 768px) {
    .container { flex-direction: column; gap: 40px; }
    .emergency-wrapper { width: 90vw; max-width: 420px; }
    .btn { font-size: 26px; }
}
</style>
</head>

<body>

<form method="post">
    <div class="container">

        <!-- BOTÓN DELAY CON LED AZUL -->
        <div class="emergency-wrapper">
            <div class="led-ring" id="ledDelay"></div>
            <button class="btn delay" name="button" type="submit" onclick="activarDelay(event)">
                <span class="label">DELAY</span>
            </button>
        </div>

        <!-- BOTÓN AHORA CON LED VERDE -->
        <div class="emergency-wrapper">
            <div class="led-ring" id="ledNow"></div>
            <button class="btn now" name="buttonow" type="submit" onclick="activarNow(event)">
                <span class="label">AHORA</span>
            </button>
        </div>

    </div>
</form>

<script>
function activarDelay(e) {
    const led = document.getElementById("ledDelay");
    led.classList.add("led-active", "blue");

    // remover el LED tras 5s
    setTimeout(() => { led.classList.remove("led-active", "blue"); }, 5000);
}

function activarNow(e) {
    const led = document.getElementById("ledNow");
    led.classList.add("led-active", "green");

    // remover el LED tras 1s
    setTimeout(() => { led.classList.remove("led-active", "green"); }, 1000);
}
</script>

</body>
</html>
