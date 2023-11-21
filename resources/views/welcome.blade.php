<!DOCTYPE html>
<html>
<head>
    <title>Generowanie kodu kreskowego</title>
</head>
<body>
<form action="{{ route('generate.barcode') }}" method="GET">
    <label for="barcodeText">Wprowadź tekst:</label><br>
    <input type="text" id="barcodeText" name="text"><br><br>
    <input type="submit" value="Generuj kod kreskowy">
</form>

@if(session('error'))
    <div>{{ session('error') }}</div>
@endif
</body>
</html>
