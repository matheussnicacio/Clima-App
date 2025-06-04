<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previsão do Tempo</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        .error { color: red; }
        .weather { margin: 20px; padding: 20px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <h1>Previsão do Tempo</h1>

    @if (isset($error))
        <p class="error">{{ $error }}</p>
    @else
        <div class="weather">
            <h2>{{ $weather['name'] }} - {{ $weather['sys']['country'] }}</h2>
            <p>Temperatura: {{ $weather['main']['temp'] }} °C</p>
            <p>Condição: {{ $weather['weather'][0]['description'] }}</p>
            <p>Umidade: {{ $weather['main']['humidity'] }}%</p>
            <p>Vento: {{ $weather['wind']['speed'] }} m/s</p>
        </div>
    @endif
</body>
</html>