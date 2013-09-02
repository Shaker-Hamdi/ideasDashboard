<?php

namespace Aqarmap\Bundle\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Aqarmap\Bundle\DashboardBundle\Entity\Users;

class DefaultController extends Controller
{
    public function indexAction(Request $request) {

    	if($request->getMethod() == "POST") {
    		$username = $request->get('username');
    		$password = $request->get('password');

	    	$em = $this->getDoctrine()->getEntityManager();
	    	$repository = $em->getRepository('AqarmapDashboardBundle:Users');

	    	$user = $repository->findOneBy(array('username'=>$username, 'password'=>$password));

	    	if($user) {
	    		return $this->render('AqarmapDashboardBundle:Home:home.html.twig', array('username'=>$user->getUsername()));
	    	} 

    	} else {
    		return $this->render('AqarmapDashboardBundle:Default:index.html.twig');
    	}

        
    } // endix action


    public function registerAction(Request $request) {

    	if($request->getMethod() == "POST") {
    		$username = $request->get('username');
    		$email = $request->get('email');
    		$password = $request->get('password');
    		$role = "memeber";

    		$user = new Users();
    		$user->setUsername($username);
    		$user->setPassword($password);
    		$user->setEmail($email);
    		$user->setRole($role);

    		$em = $this->getDoctrine()->getEntityManager();
    		$em->persist($user);
    		$em->flush();
    		return $this->render('AqarmapDashboardBundle:Default:index.html.twig');
    	}

    }// register action

}
