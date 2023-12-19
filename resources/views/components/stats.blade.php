<div class="statistics card mb-5 bg-dark text-white">
    <div class="card-body">
        <h2 class="card-title text-center mb-3">Statistiques</h2>
        <div class="row justify-content-center text-center">
            <div class="col-sm-2 mb-2">
                <p class="card-text">Note moyenne : <span class="font-weight-bold">{{ $noteMoy }}</span></p>
            </div>
            <div class="col-sm-2 mb-2">
                <p class="card-text">Note la plus haute : <span class="font-weight-bold">{{ $noteMax }}</span></p>
            </div>
            <div class="col-sm-2 mb-2">
                <p class="card-text">Note la plus basse : <span class="font-weight-bold">{{ $noteMin }}</span></p>
            </div>
            <div class="col-sm-2 mb-2">
                <p class="card-text">Nombre de notes : <span class="font-weight-bold">{{ $noteCount }}</span></p>
            </div>
            <div class="col-sm-2 mb-2">
                <p class="card-text mb-0">Nombre de favoris : <span class="font-weight-bold">{{ $favoritesCount }}</span></p>
            </div>
        </div>
    </div>
</div>
