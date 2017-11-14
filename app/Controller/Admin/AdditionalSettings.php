<?php
		// use of IntlDateFormatter class to get a "French date"
		$mask = "EEEE d MMMM YYYY '&agrave;' HH:mm ";


		$date = new DateTime($comment->commentDate);
		//$postedDate = datefmt_format_object($date);

?>
		<span class="date-comment">
		
            <?= "Posté le " . IntlDateFormatter::formatObject($date,$mask) . " . " ;?>
            
		</span>


  <?php
// On place dans une variable le nombre de billet souhaité par page
$nbrOfPostsPerPage = 10;
// On récupère le nombre total de billets
$totalPostsCount = count($posts);
// On calcule le nombre de pages à créer
$nbrOfPage  = ceil($totalPostsCount / $nbrOfPostsPerPage);



// Puis on fait une boucle pour écrire les liens vers chacune des pages
echo 'Page : ';

for ($i = 1 ; $i <= $nbrOfPage ; $i++)
{
   echo '<a href="?p=posts.index&page=' . $i . '">' . $i . '</a> ';
}

if (isset($_GET['page']))
{
        $page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse
}
else // La variable n'existe pas, c'est la première fois qu'on charge la page
{
        $page = 1; // On se met sur la page 1 (par défaut)
}
  
// On calcule le numéro du premier message qu'on prend pour le LIMIT de MySQL
$firstPostToShow = ($page - 1) * $nbrOfPostsPerPage;
 
$req1 = mysql_query('SELECT * FROM articles ORDER BY articles.date DESC LIMIT ' . $firstPostToShow . ', ' . $nbrOfPostsPerPage);
while ($req2 = mysql_fetch_array($req1))
{

}

?>
 