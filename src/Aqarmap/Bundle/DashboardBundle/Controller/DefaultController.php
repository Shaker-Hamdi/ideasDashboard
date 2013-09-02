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

	    	$em = $this->getDoctrine()->getManager();
	    	$repository = $em->getRepository('AqarmapDashboardBundle:Users');

	    	$user = $repository->findOneBy(array('username'=>$username, 'password'=>$password));

	    	if($user) {
	    		return $this->render('AqarmapDashboardBundle:Home:home.html.twig', array('username'=>$user->getUsername()));
	    	} 

    	} else {
    		return $this->render('AqarmapDashboardBundle:Default:index.html.twig');
    	}

        
    } // endix action


    

}
