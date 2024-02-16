<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Faker\Factory;
use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $genre = ['male', 'female'];
        $categories = [];
        
        $categorie = new Categorie();
        $categorie->setlibelle('Professionnel')
                  ->setimage('https://picsum.photos/id/5/200/300')
                  ->setdescription($faker->sentence(50));
        $manager->persist($categorie);
        $categories[] = $categorie;

        $categorie = new Categorie();
        $categorie->setlibelle('Sport')
                  ->setimage('https://picsum.photos/id/73/200/300')
                  ->setdescription($faker->sentence(50));
        $manager->persist($categorie);
        $categories[] = $categorie;

        $categorie = new Categorie();
        $categorie->setlibelle('Privé')
                  ->setimage('https://picsum.photos/id/342/200/300')
                  ->setdescription($faker->sentence(50));
        $manager->persist($categorie);
        $categories[] = $categorie;
        
        for($i=0 ;$i<100; $i++){ 
            $sexe = mt_rand(0,1);
            if ($sexe==0) {
                $type ='men';
            } else{
                $type ='women';
            }
       
        $contacts = new Contact();
        $contacts->setNom($faker->lastName())
                 ->setPrenom($faker->firstName($genre[$sexe]))
                 ->setsexe($sexe)
                 ->setcategorie($categories[mt_rand(0,2)])
                 ->setRue( $faker->streetAddress())
                 ->setCp( $faker->numberBetween(33000,75000))
                 ->setVille($faker->city())
                 ->setMail($faker->email())
                 ->setAvatar("https://randomuser.me/api/portraits/".$type."/".$i.".jpg");
         $manager->persist( $contacts );
        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
