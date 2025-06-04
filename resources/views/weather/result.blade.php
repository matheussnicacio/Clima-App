<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clima em {{ $data['city'] }} - Clima Brasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .weather-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .temperature {
            font-size: 4rem;
            font-weight: 300;
            color: #2d3436;
        }
        .weather-icon {
            width: 100px;
            height: 100px;
        }
        .info-card {
            background: rgba(116, 185, 255, 0.1);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            border: 1px solid rgba(116, 185, 255, 0.2);
        }
        .btn-back {
            background: linear-gradient(45deg, #636e72, #2d3436);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(45, 52, 54, 0.4);
        }
        .city-name {
            background: linear-gradient(45deg, #2d3436, #636e72);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-8">
                <div class="weather-card p-5">
                    <!-- Cabeçalho -->
                    <div class="text-center mb-4">
                        <h1 class="city-name mb-2">{{ $data['city'] }}, {{ $data['country'] }}</h1>
                        <p class="text-muted">{{ ucfirst($data['description']) }}</p>
                    </div>

                    <!-- Temperatura Principal -->
                    <div class="row align-items-center mb-4">
                        <div class="col-md-6 text-center">
                            <img src="http://openweathermap.org/img/wn/{{ $data['icon'] }}@4x.png" 
                                 alt="Condição climática" 
                                 class="weather-icon mb-3">
                            <div class="temperature">{{ $data['temperature'] }}°C</div>
                            <p class="text-muted">Sensação térmica: {{ $data['feels_like'] }}°C</p>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="info-card">
                                        <i class="fas fa-tint fa-2x text-primary mb-2"></i>
                                        <h5>{{ $data['humidity'] }}%</h5>
                                        <small class="text-muted">Umidade</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="info-card">
                                        <i class="fas fa-wind fa-2x text-success mb-2"></i>
                                        <h5>{{ $data['wind_speed'] }} m/s</h5>
                                        <small class="text-muted">Vento</small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="info-card">
                                        <i class="fas fa-thermometer-half fa-2x text-warning mb-2"></i>
                                        <h5>{{ $data['pressure'] }} hPa</h5>
                                        <small class="text-muted">Pressão Atmosférica</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botão Voltar -->
                    <div class="text-center">
                        <a href="{{ route('weather.index') }}" class="btn btn-back text-white">
                            <i class="fas fa-arrow-left me-2"></i>Consultar Outra Cidade
                        </a>
                    </div>

                    <!-- Informações Adicionais -->
                    <div class="mt-4 text-center">
                        <small class="text-muted">
                            <i class="fas fa-clock me-1"></i>
                            Dados atualizados em tempo real via OpenWeatherMap
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>