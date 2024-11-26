<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .info-section {
            margin-bottom: 20px;
        }

        .info-section h2 {
            font-size: 18px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        .info-section p {
            margin: 0 0 8px;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .details-table th, .details-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .details-table th {
            background-color: #f2f2f2;
        }

        .details-table td {
            font-size: 14px;
        }

        .total-section {
            margin-top: 20px;
            text-align: right;
        }

        .total-section h3 {
            font-size: 18px;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Header -->
    <div class="header">
        <h1>Reporte de Compra</h1>
    </div>

    <!-- Información de la Transacción -->
    <div class="info-section">
        <h2>Información de la Transacción</h2>
        <p><strong>Nro. de Transacción:</strong> {{ $transaccion->id }}</p>
        <p><strong>Tipo de Transacción:</strong> {{ $transaccion->tipo }}</p>
        <p><strong>Fecha:</strong> {{ $transaccion->fecha }}</p>
        <p><strong>Persona:</strong> {{ $transaccion->persona->nombre ?? 'N/A' }}</p>
        <p><strong>Usuario Responsable:</strong> {{ $transaccion->usuario->name ?? 'N/A' }}</p>
        <p><strong>Estado:</strong> {{ $transaccion->estado }}</p>
    </div>

    <!-- Detalle de la Compra -->
    <div class="info-section">
        <h2>Detalle de la Compra</h2>
        <table class="details-table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Lote</th>
                    <th>Cantidad</th>
                    <th>Costo</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaccion->detalles as $detalle)
                <tr>
                    <td>{{ $detalle->producto->nombre ?? 'N/A' }}</td>
                    <td>{{ $detalle->lote->codigo ?? 'N/A' }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ number_format($detalle->precio_unitario, 2) }}</td>
                    <td>{{ number_format($detalle->subtotal, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Total de la Transacción -->
    <div class="total-section">
        <h3><strong>Total: </strong>{{ number_format($transaccion->total, 2) }} Bs.</h3>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Este es un reporte generado automáticamente por el sistema.</p>
    </div>
</div>

</body>
</html>
