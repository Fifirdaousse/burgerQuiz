USE `540_fc`;

INSERT INTO role (id, nom) VALUES
     (10, 'Gestionnaire')
    ,(20, 'Membre')
;

INSERT INTO utilisateur (id, nom, prenom, email, motDePasse, idRole) VALUES
    (1, 'Smith', 'KJ', 'smith@gmail.com', 'mdp', 20)
    ,(2, 'Harper', 'Eve', 'harper@gmail.com', 'evy', 10)
;

INSERT INTO question (numero, intitule, idUser) VALUES
    (1, 'Qui a dit que 1+1 pouvait faire "même peut-être 11" ?', 2)
    ,(2, "En combien d'heures les protagonistes du 'Tour de monde' en 80 jours de Jules Verne font-ils le tour du monde ?", 2)
    ,(3, "Dans les Simpson, le gérant du bar s'appelle :", 2)
    ,(4, "Qui n'a jamais combattu Dracula au cinéma ?", 2)
    ,(5, "Laquelle de ces peintures n'existe pas ?", 2)
    ,(6, "Quelle raplique est tirage du film 'Fantomas' de André Hunnebelle ?", 2)
    ,(7, "Qu'est-ce qui est surpenant quand David Banner se transforme en Hulk ?", 2)
    ,(8, "Jean-Claude Vandamme a déclaré dans Première : Je suis fasciné par l'air. Si vous enlever l'air du ciel...", 2)
    ,(9, 'En plongée, qui signifie le geste pouce et index joints faisant un cercle ?', 2)
    ,(10, "Qu'est-ce que la kénophobie ?", 2)
    ,(11, "Quel gang n'a jamais existé au cinéma ?", 2)
    ,(12, "Un anglais a reçu un avertissement de la SPA anglaise parce qu'il :", 2)
    ,(13, 'Quel est le point commun ente Janis Joplin, Jimi Hendrix et Jim Morisson ? ', 2)
    ,(14, "Quelle est la durée de vie d'un termite ?", 2)
    ,(15, "Une seule de ces chansons de Fancky Vincent n'est pas dans l'album Franky Vincent ?", 2)
    ,(16, "A quoi s'intéresse-t-on quand on fait de la potamologie ?", 2)
    ,(17, "Que signifie le nom du groupe corse 'I Muvrini' ?", 2)
    ,(18, 'Laquelle de ces montagnes existe ?', 2)
    ,(19, "Qu'est-ce qu'une ploutocratie ?", 2)
    ,(20, "En l'an 2000, combien de personnes ont été tuées par des requins ?", 2)
    ,(21, "Comment est mort l'inventeur du parachute ?", 2)
    ,(22, 'Yamakasi veut dire :', 2)
    ,(23, 'Quel est le nom de la petite Sirène de Disney ?', 2)
    ,(24, 'Pourquoi les autruches enfouissent-elles leut tête dans le sol ?', 2)
    
;

INSERT INTO proposition (lettre, intitule, estBonneReponse, idQuestion) VALUES
    ('A', "Jean-Claude Vandamme ?", 1, 1)
    ,('B', "Javascript ?", 0, 1)
    ,('C', "Obi-Wan Kenobi", 0, 1)

    ,('A', "1500 heures", 0, 2)
    ,('B', "1800 heures", 1, 2)
    ,('C', "2437 heures", 0, 2)
    ,('D', "1 million d'heures", 0, 2)

    ,('A', "Moe", 1, 3)
    ,('B', "Joe", 0, 3)
    ,('C', "Gourio", 0, 3)
    ,('D', "Sue Ellen", 0, 3)

    ,('A', "Les Charlots contre Dracula", 0, 4)
    ,('B', "Dracula contre Frankenstein", 0, 4)
    ,('C', "Billy le Kid conte Dracula", 0, 4)
    ,('D', "Dracula conte Godzilla", 1, 4)
    
    ,('A', "La peinture à l'oeuf", 0, 5)
    ,('B', "La peinture à la cire", 0, 5)
    ,('C', "La peinture à la harissa", 1, 5)
    ,('D', "La peinture au couteau", 0, 5)

    ,('A', '"Haut les mains, peau de lapin"', 1, 6)
    ,('B', '"Mïche courte, connard"', 0, 6)
    ,('C', '"Did you fuck my wife ?"', 0, 6)
    ,('D', "Ha oui, c'est bien moi Fantomas", 0, 6)

    ,('A', "Il ressemble au géant vert", 0, 7)
    ,('B', "Il ne pense pas à faire du yoga", 0, 7)
    ,('C', "Il déchire tous ses vétements, sauf son short et son caleçon. C'est fou, il a une toute petite bite finalement !", 1, 7)
    ,('D', "Il change de nom alors qu'il ne sait pas parler", 0, 7)

    ,('A', "Il n'y aura plus d'air", 0, 8)
    ,('B', "On sera dead et plus alive", 0, 8)
    ,('C', "Tous les oiseaux tomberaient par terre", 1, 8)
    ,('D', "Il faudrait aller vivre sous l'eau", 0, 8)

    ,('A', "Je lui ai mis la rondelle comme ça", 0, 9)
    ,('B', "Ta blague, elle vaut zéro", 0, 9)
    ,('C', "Je vais bien, tout va bien ", 1, 9)
    ,('D', "Vas-y, vise là  dedans avec ton harpon", 0, 9)

    ,('A', "La peut de jouer au Kéno", 0, 10)
    ,('B', "La peur des fromages", 0, 10)
    ,('C', "La peur de Ken le survivant", 0, 10)
    ,('D', "La peur de la nuit ?", 1, 10)

    ,('A', "Le gang des chaussons aux pommes", 0, 11)
    ,('B', "La gang des chanteurs À  moustache", 1, 11)
    ,('C', "Le gang des pianos À  bretelle", 0, 11)
    ,('D', "Le gang du dimanche", 0, 11)

    ,('A', "Appelait toutes ses vaches avec des noms de la famille royale", 0, 12)
    ,('B', "Lançait des vaches mortes avec une catapulte", 1, 12)
    ,('C', "Tuait des vaches à main nues", 0, 12)
    ,('D', "Avait offert un piercing à sa vache", 0, 12)

    ,('A', "La drogue", 0, 13)
    ,('B', "Le J de leur prénom", 0, 13)
    ,('C', "Ils sont tous morts au même âge, 27 ans", 0, 13)
    ,('D', "a,b, c et donc d", 1, 13)

    ,('A', "13 jours", 0, 14)
    ,('B', "Deux siècles", 0, 14)
    ,('C', "60 ans", 1, 14)
    ,('D', "Comme Christophe Lambert, le termite est immortel", 0, 14)

    ,('A', "Réchauffe l'hiver", 0, 15)
    ,('B', "Donne-moi ta friandise", 0, 15)
    ,('C', "Suce ma banane", 1, 15)
    ,('D', "T'es chiant(e)", 0, 15)

    ,('A', "Aux hippopotames", 0, 16)
    ,('B', "Aux potagers", 0, 16)
    ,('C', "Aux fleuves", 1, 16)
    ,('D', "Aux potins", 0, 16)

    ,('A', "Les moutons", 0, 17)
    ,('B', "Les mouflons", 1, 17)
    ,('C', "Les chanteurs", 0, 17)
    ,('D', "Putain moins fort y'en a marre", 0, 17)

    ,('A', "Le mont Frolic", 0, 18)
    ,('B', "Le mont Canigou", 1, 18)
    ,('C', "Le mont Royal Canin", 0, 18)
    ,('D', "Le mont Pal", 0, 18)

    ,('A', "Un régime politique où le pouvoir appartient aux plus fortunés.", 1, 19)
    ,('B', "Un régime politique merveilleux ou le pouvoir appartient à Pluto et à tous ces amis", 0, 19)
    ,('C', "Un régime politique où le pouvoir appartient aux plus forts", 0, 19)
    ,('D', "Un régime amaincissant À base de ploutes", 0, 19)

    ,('A', "10 personnes", 1, 20)
    ,('B', "100 personnes", 0, 20)
    ,('C', "2000 personnes", 0, 20)
    ,('D', "Ca dépend combien de fois t'as vu les dents de la mer", 0, 20)

    ,('A', "Dans son lit comme tout le monde", 0, 21)
    ,('B', "Dans le lit de sa femme, comme tout le monde", 0, 21)
    ,('C', "Dans un accident d'avion", 0, 21)
    ,('D', "En sautant de la Tour Eiffel, le con", 1, 21)

    ,('A', '"Homme araignée" en japonais', 0, 22)
    ,('B', '"Homme fort" en zaïrois', 1, 22)
    ,('C', "Yamakaso, au pluriel", 0, 22)
    ,('D', "Homme moitié Yamaha, moitié Kawasaki", 0, 22)

    ,('A', "Skip", 0, 23)
    ,('B', "Ariel", 1, 23)
    ,('C', "Omo Micro", 0, 23)
    ,('D', "Dash 3 en 1", 0, 23)

    ,('A', "Pour se cacher", 0, 24)
    ,('B', "Pour protéger leurs oeufs", 1, 24)
    ,('C', "Pour avoir moins chaud", 0, 24)
    ,('D', "Pour déconner", 0, 24)
;