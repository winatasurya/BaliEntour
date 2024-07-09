<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penawaran</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<style>
body {
    background-color: #f1f1f1;
    margin: 0;
    padding: 30px;
    justify-content: center;
    align-items: center;
}

.navbar {
    width: 100%;
    color: #fff;
    display: flex;
    align-items: center;
    padding: 10px 20px;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
}

.back-button {
































































































































    display: flex;
    align-items: center;
    margin-right: 20px;
}

.back-button img {
    width: 24px;
    height: 24px;
}


.main-content {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.title h1 {
    text-align: center;
    font-size: 40px;
}

.container {
    width: 100%;
    display: flex;
    justify-content: center;
}

.container img {
    width: 50%;
    object-fit: cover; /* Memastikan gambar mengisi elemen tanpa distorsi */

}

.deskripsi {
    display: flex;
    justify-content: center;
    padding: 0 20px;
}

.deskripsi p {
    text-align:justify;
    font-size: 20px;
}

.card-container {
    display: flex;
    overflow-x: auto;
    gap: 20px;
    width: 85vw;
    align-items:center;
    padding: 20px 0;
}
/* .card-container::-webkit-scrollbar{
    width: 0;
} */

.card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 300px;
    text-align: center;
    flex-shrink: 0;
}

.card-img {
    width: 100%;
    height: 200px;
    object-fit: cover; /* Memastikan gambar mengisi elemen tanpa distorsi */
}

.card-title {
    padding: 15px;
    font-size: 1.2em;
    color: #333;
}
.info{
    width: 90%;
    display: flex;
    justify-content: space-between;
    padding: 10px 20px;
    margin-top: 20px;
}
.lokasi .contact{
    display: flex;
    align-items: center;
}

.form p{
    font-size: 30px;
}
.contact{
    display: flex;
    justify-content: center;
    background-color: #543310;
    width: 50%;
    color: white;
}
</style>
<body>
<nav class="navbar">
        <a href="welcome" class="back-button">
            <img src="img/arrow.png" alt="Back">
        </a>
    </nav>
    <div class="main-content">
    <div class="title">
        <h1>Sanctoo Villa</h1>
        <div class="container">
            <img src="img/sanc.jpg" alt="">
        </div>
        </div>
            <div class="deskripsi">
                <p>This resort villa features free Wi-Fi in all rooms for easy connection, and car park free of charge. Conveniently situated in the Ubud part of Bali, this property puts you close to attractions and interesting dining options. Don't leave before paying a visit to the famous Sacred Monkey Forest Sanctuary. Rated with 5 stars, this high-quality property provides guests with access to massage, restaurant and spa on-site</p>
            </div>
    <div class="card-container">
        <div class="card">
            <img src="img/paja.jpg" alt="Hotel Room 1" class="card-img">
        </div>
        <div class="card">
            <img src="img/paja.jpg" alt="Hotel Room 2" class="card-img">
        </div>
        <div class="card">
            <img src="img/paja.jpg" alt="Hotel Room 3" class="card-img">
        </div>
        <div class="card">
            <img src="img/paja.jpg" alt="Hotel Room 4" class="card-img">
        </div>
        <div class="card">
            <img src="img/paja.jpg" alt="Hotel Room 4" class="card-img">
        </div>
        <div class="card">
            <img src="img/paja.jpg" alt="Hotel Room 4" class="card-img">
        </div>
        <div class="card">
            <img src="img/paja.jpg" alt="Hotel Room 4" class="card-img">
        </div>
    </div>
    </div>
</body>
</html>