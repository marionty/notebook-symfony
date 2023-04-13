<?php

namespace App\DataFixtures;

use App\Entity\Note;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i < 50 ; $i++) {
            $note = new Note();
            $note -> setTitle('My first note . $i')
                    ->setContent('This is my first note')
                    //->setCreatAt(2023-03-01)
                    //->setUpdated(2023-04-01)
                    ->setAuthor('Marion');
                    
                    $manager->persist($note);
        
        //Ajoute des catégories ) la base de données
        $categories = ['PHP', 'Symfony', 'Doctrine', 'Twig', 'MySQL', 'JavaScript', 'React', 'Vue', 'Angular', 'NodeJS'];

        $colors = ['red', 'blue', 'green', 'yellow', 'orange', 'purple', 'pink', 'brown', 'black', 'white', 'grey', 'cyan', 'magenta', 'lime', 'olive', 'teal', 'navy', 'maroon', 'aqua', 'fuchsia'];

        //boucle sur les catégories
        for ($i=0; $i < count($categories); $i++) {
            $category = new Category();
            $category->setTitle($categories[$i])
            ->setColor($colors[array_rand($colors)]);
        }

        $manager->persist($category);
    }
        $manager->flush();
    }
}
