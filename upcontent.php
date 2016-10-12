<?php
require_once 'inc.php';
$requete = array(THEKEYWORD);
$rand_keys = array_rand($requete, 1);
$requete = utf8_decode($requete[$rand_keys]);

$verbeTransitif = array(
"retrouvez",
"appréciez",
"admirez	",
"choisissez",
"découvrez",
"venez découvrir",
"achetez",
"comtempler",
"approuvez",
"adoptez	",
"acquérez",
"commandez",
"offrez vous");

$verbeIntransitif = array(
"faites-vous plaisir avec",
"saisissez-vous de",
"bénéficiez de",
"profitez de",
"jugez de",
"imprégnez-vous de ",
"opter pour",
);


$cods = array( // cod =  compléments d'objet direct
"coups de coeur",
"selections",
"modèles",
"présentations",
"collections",
"tris",
"expositions",
"choix",
"spécimens",
"variétés",
"séries",
"ensembles choisis",
"différents types de",
"suggestions",
"propositions",
"offres",
"recommandations",
"promotions"
);


$upContent = array(
	"Admirez ce beau ".$requete." et surtout acquérez le car il fait partie des plus demandés.",
	"Ce <strong>".$requete."</strong> proposé à un prix bon marché, vous fera faire des économies tout en vous rendant encore plus élégant.",
    "N'hésitez pas à choisir ce <strong>".$requete."</strong> car il a été conçu pour vous afin de vous rendre toute votre grace.",
    "Si la distinction, l'élégance et la classe sont des notions importantes pour vous, alors optez pour ce <strong>".$requete."</strong>.",
    "Informez votre entourage de cette offre afin qu'il puisse profiter de l'opportunité qui vous est proposée, il vous en sera très reconnaissant.",
    "Nous vous recommandons ce magnifique <strong>".$requete."</strong> proposé par beaucoup de grandes marques et vous assurons la satisfaction.",
    "Ce <strong>".$requete."</strong> vous ira certainement à merveille, alors commandez-le alors qu'il est encore en stock, en effet, il est très prisé.",
    "C'est un <strong>".$requete."</strong> qui continue de faire l'unanimté, il est en effet, constamment commandé et acheté.",
    "Notre suggestion se porte sur ce <strong>".$requete."</strong> étant donné qu'il peut se mettre à diverses occasions.",
    "Permettez-nous de vous suggérer ce beau spécimen qui fait partie des meilleures ventes,de plus, les retours qui s'y rapportent sont généralement positifs.",
    "Si vous vous êtes informés à propos de ce ".$requete." ,vous êtes certainement sans savoir que c'est un produit qui se vend très bien et que avez grand intérêt à vous l'apprprier.",
    "Ce produit vous ira à merveille car il est adapté à toute circonstance et à tout style, de plus, sa valeur est accessible à tout budget.",
    "Vous hésitez encore à vous décider, ce beau ".$requete." n'attend que vous , alors n'attendez pas trop longtemps car il pourrait satisfaire d'autres prétendants.",
    "N'allez pas plus loin, vous avez trouvé la perle rare que vous recherchiez certainement depuis bien longtemps, pourquoi donc tarder?!",
    "Vous pouvez vous féliciter d'être tomber sur ce magnifique trésor, pourquoi donc allez chercher votre ".$requete." ailleurs?",
    "Quand on cherche, on trouve; vous avez cherché et vous avez trouvé ce splendide ".$requete." qui fait beaucoup parler de lui en ce moment.",
    "La vie est ainsi faite: il arrive parfois qu'on trouve exactement ce que l'on recherche, et tel est certainement votre cas à cet instant précis face à ce bijou de ".$requete.".",
    "Vous l'aimez mais vous hésitez encore? Ecoutez votre coeur et faîtes-vous plaisir en acquérant ce joyau.",
    "Ce beau spécimen fait l'objet de beaucoup d'attention, puisqu'il fait partie des meilleures ventes; beaucoup l'achetent ou le recommandent à leurs proches.",
    "Faites votre bonheur ou celui d'un proche ou d'une proche en acquérant ce petit trésor, vous ne le regueterez pas car il répond à beaucoup de critères.",
    "Vous avez des doutes? et vous vous demandez encore si ce bijou sera à la hauteur de vos attentes? Sachez que beaucoup sont se sont posés les mêmes questions que vous et sont aujourd'hui très satisfaits",
    "Si vous vous êtes arrêtés sur ce produit c'est que vous avez été séduit(e) quelque part, alors prenez le temps de bien réfléchir avant d'y rénoncer.",
    "L'on dit souvent que la première impression est la bonne, alors l'instant précis, écouter votre coeur et faites vous plaisir en acquérant ce ".$requete.".",
    "vous avez certainement entendu parler de ce ".$requete." sinon vous êtes la personne qui fera parler de ce produit. En effet, vous vanterez ses mérites car vous n'en serez pas déçus.",
    "Notre site vous propose un large choix de produits dont celui-ci, qui très certainement vous satisfera, car nous présentons sur ce site, les meilleurs selections.",
    "Tachez de ne pas oublier de parler de ce site à vos proches, et dites leur bien que vous avez découvert ce trésor que vous contemplez en ce moment.",
    "L'on a tendance à oublier que le temps qui passe ne revient plus; pourquoi pas ce bijou pour marquer un événement dans le temps?",
    "Ce bijou vous rendra certainement heureux, car il a plu à  beaucoup. C'est un joyau qui fait partie des plus demandés.",
    "A chaque jour ses spécifités, et donc à chaque jour ses perles rares. Vous êtes tombés sur cette dernière et vous vous posez encore des questions? Mais la vraie question est ce bijou sera t-elle encore là demain, si je décide finalement de l'acquérir?: ",
    "Les questions qu'on se pose généralement face à produit sont le plus souvent liées au prix et à la qualité. Rassurez vous donc, car nous ne proposons que des produits susceptibles de plaire à tous les niveaux. ",
    "Ce ".$requete." vous a séduit(e)? Nous avons fait le nécessaire pour que vous le soyez. Sinon vous avez beaucoup d'autres produits sur ce site qui certainement seront à la hauteur de vos attentes; car comme on le dit souvent : les goûts et les couleurs ne se discutent pas. ",
    "Nous souhaitons à nos visiteurs de trouver leur bonheur sur ce site. En tout cas, nous oeuvrons dans ce sens. Alors si vous êtes devant ce  ".$requete.", sahez qu'il a été soigneusement sélectionné afin de vous satisfaire.",
    "Sois la raison du sourire de quelqu'un aujourd'hui (comme le dit si bien le proverbe), en lui offrant cette merveille, tu n'en seras qu'heureux.",
    "L'amour et la passion seraient des battements de coeur de la vie; pourquoi ne pas donc perpétuer ces battements en lui offrant ce bijou?",
    "La perception des autres vis à vis de soi n'est pas si importante, l'essentiel réside dans ce que l'on ressent. Alors faites-vous plaisir en vous rendant propriétaire de cette perle rare.",
    "Ne te sens jamais coupable de faire ce qui est bon pour toi, dit-on. Si vous pensez que ce  ".$requete." est fait pour vous, quoi de plus légitime que de se le procurer?",
    "Que vous soyez capricorne, taureau, sagitaire ou autre, ce ".$requete.", s'il vous plaît, sera très certainement à la hauteur de votre personnalité.",
    ""
    );

$rand_keys = array_rand($upContent, 1);
echo utf8_decode($upContent[$rand_keys]).'<br>';
for($i=1;$i<3;$i++){
	$pos_cod = rand(0, count($cods));
	$pos_verbe = rand(0, count($verbeTransitif));
	if(isset($verbeTransitif[$pos_verbe])&&isset($cods[$pos_cod])){
        echo utf8_decode($verbeTransitif[$pos_verbe]).' '.'nos'.' '.utf8_decode($cods[$pos_cod]).' '.'de'.' '.'<strong>'.$requete.'.</strong>'.'<br>';
    }
unset($verbeIntransitif);
unset($upContent);unset($rand_keys);	
}unset($verbeTransitif)	;unset($cods);unset($requete);