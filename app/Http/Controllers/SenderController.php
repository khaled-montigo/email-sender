<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Mailjet\Resources;
use stdClass;
use Validator;



class SenderController extends Controller
{

  public function Send(Request $request){
      $returnJsonData = new stdClass();
      $returnJsonData->success = false;

      $mj = new \Mailjet\Client('481b366323c9b3051fda2e2c632b554e','db1a7347ef547fdf9fab85aeb3243642',true,['version' => 'v3.1']);
      $validatedData = Validator::make($request->all(), [
          'name' => 'required',
          'phone' => 'required|Numeric|min:10',
          'email' => 'required|email',
          'message' => 'required|min:20',
      ],
          [
              'name.required' => 'please enter your name ',
              'phone.required' => 'please enter your phone number',
              'phone.Numeric' => 'phone must be a number',
              'phone.min' => 'mobile must be valid',
              'email.required' => 'please enter your email address',
              'email.email' => 'Your email address must be in the format of name@domain.com',
              'message.required' => 'please enter your message',
              'message.min' => 'Your message most be more than 20 latter',
          ]
      );

      if ($validatedData->fails()) {
          $returnJsonData->message = "data not valid";
          $returnJsonData->error = $validatedData->errors();

          return response()->json($returnJsonData);
      }

      $Name = $request->input('name');
      $Phone = $request->input('phone');
      $Email = $request->input('email');
      $Message = $request->input('message');


      $body = [
          'Messages' => [
              [
                  'From' => [
                      'Email' => "info@montyhouse.com",
                      'Name' => "Info"
                  ],
                  'To' => [
                      [
                          'Email' => "info@montyhouse.com",
                          'Name' => "Web Site Info"
                      ]
                  ],
                  'Subject' => $Name . " send mail from website",
                  'TextPart' => $Name . " send mail from website",
                  'HTMLPart' => "<h3>".$Name." send you message from this email : ".$Email."</h3>
                                <h3>".$Phone." </h3>
                                <br /> ". $Message,
                  'CustomID' => $Name . "a"
              ]
          ]
      ];

      $response = $mj->post(Resources::$Email, ['body' => $body]);
      $response->success();
      $returnJsonData->success = true;




      return response()->json($returnJsonData);


  }

}
