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

Lorsque vous voulez ajouter un nouveau mot, il vous sera demandé d'utiliser un identifiant qui correspond à la traduction du mot en espéranto précédé d'un 0. Pourquoi l'espéranto ? Car c'est une langue neutre et très flexible. Nul besoin de connaître l'espéranto pour ce faire, vous pouvez vous référer à ce traducteur: https://www.majstro.com/Web/Majstro/adict.php?gebrTaal=fra&vk=0&ps=0&bronTaal=fra&doelTaal=epo&teVertalen= . Si vous n'êtes pas sûr de quel mot prendre, allez voir dans d'autres lexiques quels ID sont utilisés. Si jamais le mot en espéranto n'existe pas, mettez "00FRmot" (FR ou un autre code de langue, et mot remplacé par le mot dans cette langue.) en ID temporaire, on verra des espérantistes pour un ID final.

Tout ceci permet d'éviter d'organiser les indexs de manière alphabétique et donc laisser plus de flexibilitée à la chose, sans prioriser une langue.

Aussi, cet atlas veut se rapprocher un maximum de la réalité linguistique. Veuillez être sûrs qu'on traduit bien tel mot telle manière dans telle ville. (il serait aussi pas mal d'ajouter si possible l'écriture phonétique, afin de mettre en lumière les différences de prononciation en fonction de l'endroit, malgré une potentielle même orthographe), en plus du type de mot (nm. pour nom masculin, adj. pour adjectif etc…).

Si jamais il y a des mots qui n'existent pas en français (par exemple "petrychor" en anglais), il ne faut pas hésiter à mettre dans le lexique français une courte définition entre crochets à la place du mot (ex: "[odeur de la terre après la pluie]"), et vice versa, de manière à ce que ce soit le moins franco-centré possible.
Ou alors si le mot existe mais possède des homonymes, préciser entre paranthèses (ex: "brave" en occitan -> "bon (sens humain)").

 Syntaxe d'une entrée dans le lexique:

    0identifiantesperanto|type.;mot;(optionellement une précision si homonyme);prononciation;source (optionnel);

Exemples:

    0muro|nm.;mur;;\myʁ\;
    0dankon|int.;merci;(formule de politesse);\mɛʁ.si\;

NE PAS OUBLIER LES ; MÊME OPTIONNELS (mettre dans ce cas 2 ; comme sur l'exemple précedent.)

## À Faire

* Le remplir, faut dire que pour le moment c'est un petit peu vide quoi.
* Ajouter les aires graphiquement.
* Ajouter un support pour les graphies différentes.
* Ajouter des audios ?
