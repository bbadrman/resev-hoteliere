<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Service\PaginationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminUserController extends AbstractController
{
    /**
     * @Route("/admin/users/{page<\d+>?1}", name="admin_users_index")
     * @return Response
     */
    public function index(UserRepository $repo, $page, PaginationService $pagination): Response
    {
        $pagination->setEntityClass(User::class)
                   ->setPage($page);

        return $this->render('admin/user/index.html.twig', [
            'pagination' => $pagination
        ]);
    }

    /**
     * Allow us to display the edit form
     * 
     * @Route("/admin/user/{id}/edit", name="admin_user_edit")
     * 
     * @param User $user
     * @param EntityManagerInterface $manager
     * @return Response
     */

     public function edit(User $user,Request $request ,EntityManagerInterface $manager)
     {
         $form = $this->createForm(UserType::class, $user);
 
         $form->handleRequest($request);
 
         if($form->isSubmitted() && $form->isValid()) {
             $manager->persist($user);
             $manager->flush();
 
             $this->addFlash(
                 'success',
                 "The Modification made into user <strong>{$user->getFirstName()} has been Saved !</strong>"
             );
         }
 
         return $this->render('admin/user/edit.html.twig', [
             'user' => $user,
             'form' => $form->createView()
         ]);
     }
 
     /**
      * Allow us to delete a announce
      * 
      * @Route("/admin/user/{id}/delete", name="admin_user_delete")
      * 
      * @param User $user
      * @param EntityManagerInterface $manager
      * @return Response
      */
 
     public function delete(User $user, EntityManagerInterface $manager){
         if(count($user->getBookings())> 0){
             $this->addFlash(
                 'warning',
                 "You can't delete the User <strong>{$user->getFirstName()}</strong> because he has the reservations"
             );
         }else {
             $manager->remove($user);
             $manager->flush();
     
             $this->addFlash(
                 'success',
                 "The announce <strong>{$user->getFirstName()}</strong> has been deleted"
             );
         }
 
         return $this->redirectToRoute('admin_user_index');
     }
}
