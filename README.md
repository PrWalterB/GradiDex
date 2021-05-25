# GradiDex
Atlas linguistique numérique contributif et libre utilisant OpenStreetMap.
En cherchant un mot dans un lexique, il vous affichera les équivalences dans le gradient linguistique sur la carte, dans chaque ville (où le mot est fourni évidemment).
Il s'agit d'une modernisation des anciens atlas linguistiques papier, et d'un projet visant à la conservation et au redéveloppement des langues "régionales".
Projet issu de https://langues-regionales.org/

## Utilisation
Pour utiliser l'atlas, vous pouvez cloner le dépôt sur votre site, le fichier gradidex.php fonctionne de lui même. Il est aussi disponible en ligne sur https://langues-regionales.org/GradiDex/gradidex.php

## Contribuer
Vous pouvez contribuer à l'atlas en remplissant ou en créant un nouveau lexique (dans le fichier /dexs). Les fichiers de lexiques ont le nom de leur ville en minuscules.
À l'intérieur du lexique sont fournis le nom de la ville et les coordonnées de la ville (trouvables en cliquant sur la carte), et évidemment les mots.
Chaque mot est précédé d'un identifiant commun à tout les lexiques.

Lorsque vous voulez ajouter un nouveau mot, il est préférable de se référer à l'index de Paris (je ne suis pas devenu un fieffé centraliste parisien, mais c'est car il s'agit de celui contenant les mots français, et nous sommes de fait une communauté majoritairement francophone, malgré notre souhait de faire revenir les langues "régionales".), afin de voir si il n'existe pas déjà un identifiant pour le mot que vous voulez ajouter, et si non, afin de prendre un nouvel identifiant, sans le confondre avec celui d'un autre mot.

Les indexs ne sont pas organisés de manière alphabétiques, mais en fonction de leur identifiant de manière croissante.

Aussi, cet atlas veut se rapprocher un maximum de la réalité linguistique. Veuillez être sûrs qu'on traduit bien tel mot telle manière dans telle ville. (il serait aussi pas mal d'ajouter si possible l'écriture phonétique, afin de mettre en lumière les différences de prononciation en fonction de l'endroit, malgré une potentielle même orthographe), en plus du type de mot (nm. pour nom masculin, adj. pour adjectif etc…).

Si jamais il y a des mots qui n'existent pas en français (par exemple "petrychor" en anglais), il ne faut pas hésiter à mettre dans le lexique français une courte définition entre crochets à la place du mot (ex: "[odeur de la terre après la pluie]"), et vice versa, de manière à ce que ce soit le moins franco-centré possible.
Ou alors si le mot existe mais possède des homonymes, préciser entre paranthèses (ex: "brave" en occitan -> "bon (sens humain)").

 Syntaxe d'une entrée dans le lexique:

    identifiant|<i>type. </i><b>mot</b> (optionellement une précision si homonyme)<br><i>prononciation</i>

Exemples:

    000001|<i>nm. </i><b>mur</b><br><i>\myʁ\</i>
    000002|<i>int. </i><b>merci</b> (formule de politesse)<br><i>\mɛʁ.si\</i>


## À Faire

* Le remplir, faut dire que pour le moment c'est un petit peu vide quoi.
* Ajouter les aires graphiquement.
* Ajouter un support pour les graphies différentes.
* Ajouter des audios ?
