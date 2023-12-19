<x-layout>
    <style>
        table {
            margin: 0 auto;
        }

        table img {
            width: 250px;
            height: auto;
            border-radius: 50%;
            padding-left: 10px;
            cursor: pointer; /* Ajout d'un curseur pointeur pour indiquer qu'il est cliquable */
        }

        table caption {
            text-align: center;
            font-weight: bold;
        }

        table figcaption {
            text-align: center;
        }

        h1 {
            text-align: center;
            font-size: 2em;
            font-weight: bold;
        }

        p {
            text-align: center;
            font-size: 1.5em;
        }
    </style>

    <h1>À propos de nous</h1>
    <p>&#x1F451; Voici la tête de nos 4 champions &#x1F451;</p>

    <table>
        <tr>
            <td>
                <figure>
                    <a href="https://www.linkedin.com/in/just-vallin-d%C3%A9trez-066518253/"><img src={{asset("imagetete/Just.jpg")}} alt="Just"></a>
                    <figcaption>Just</figcaption>
                </figure>
            </td>
            <td>
                <figure>
                    <a href="https://www.linkedin.com/in/romain-guiffroy/"><img src={{asset("imagetete/romain.jpg")}} alt="Romain"></a>
                    <figcaption>Romain</figcaption>
                </figure>
            </td>
            <td>
                <figure>
                    <a href="https://www.linkedin.com/in/ethan-copin-01b5a7288/"><img src={{asset("imagetete/Ethan_.jpg")}} alt="Ethan"></a>
                    <figcaption>Ethan</figcaption>
                </figure>
            </td>
            <td>
                <figure>
                    <a href="https://www.linkedin.com/in/maori-sayoud-leclercq-328908294/"><img src={{asset("imagetete/maori.jpg")}} alt="Maori"></a>
                    <figcaption>Maori</figcaption>
                </figure>
            </td>
        </tr>
    </table>
</x-layout>
