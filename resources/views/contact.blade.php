<x-layout>
    <div class="d-flex justify-content-center vh-100 mt-5">
        <div class="wrap w-25 h-50 mt-5 border-dark p-5 bg-dark text-white rounded">
            <h1 class="text-center">Contactez-nous</h1>
            <form action="/contact/submit" method="post">
                @csrf
                <div class="form-group mb-2">
                    <label for="email" class="text-bg-secondary"></label>
                    <input type="email" id="email" name="email" class="form-control text-bg-secondary text-white" placeholder="email@example.com">
                </div>
                <div class="form-group mb-2">
                    <label for="name" class="text-bg-secondary"></label>
                    <input type="text" id="name" name="name" class="form-control text-bg-secondary text-white" placeholder="Votre nom">
                </div>
                <div class="form-group mb-5">
                    <label for="message" class="text-bg-secondary"></label>
                    <textarea id="message" name="message" class="form-control text-bg-secondary text-white" placeholder="Votre message"></textarea>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Soumettre" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</x-layout>
