<x-layout>
    <h1>Contactez-nous</h1>
    <form action="/contact/submit" method="post">
        @csrf
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="name">Nom:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message"></textarea><br>
        <input type="submit" value="Soumettre">
    </form>
</x-layout>
