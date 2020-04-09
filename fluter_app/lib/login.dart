import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:my_project_name/api_povider.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'home.dart';

class LoginPage extends StatefulWidget {
  @override
  _LoginPageState createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {
  TextEditingController _ctrlUsername = TextEditingController();
  TextEditingController _ctrlPassword = TextEditingController();
  final _formKey = GlobalKey<FormState>();
  ApiPovider apiPovider = ApiPovider();

  Future doLogin() async{
      if(_formKey.currentState.validate()){
        try {
          var res = await apiPovider.doLogin(_ctrlUsername.text,_ctrlPassword.text);
          if(res.statusCode == 200){
            print(res.body);
              var jsonRes = json.decode(res.body);
              //set token
              var token = jsonRes['token'];
              SharedPreferences prefs = await SharedPreferences.getInstance();
              await prefs.setString('token', token);
              Navigator.of(context).pushReplacement(
                MaterialPageRoute(builder:(context) => HomePage())
                );

          }else{
            print('Error');
          }

        } catch (e) {
          print('Error');
        }
      }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          title: Text('Please Login'),
        ),
        body: Form(
          key: _formKey,
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: <Widget>[
              Text(
                'Login MyApp',
                style: TextStyle(fontSize: 20.0, fontWeight: FontWeight.bold),
              ),
              Padding(
                padding: const EdgeInsets.all(10.0),
                child: TextFormField(
                  controller: _ctrlUsername,
                   validator: (value) {
                    if (value.isEmpty) {
                      return 'Please enter some text';
                    }
                  },
                  decoration: InputDecoration(
                      fillColor: Colors.white70,
                      filled: true,
                      labelText: 'Username',
                      border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(8))),
                ),
              ),
              Padding(
                padding: const EdgeInsets.all(10.0),
                child: TextFormField(
                  controller: _ctrlPassword,
                   validator: (value) {
                    if (value.isEmpty) {
                      return 'Please enter some text';
                    }
                  },
                  obscureText: true,
                  decoration: InputDecoration(
                      fillColor: Colors.white70,
                      filled: true,
                      labelText: 'Password',
                      border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(8))),
                ),
              ),
              RaisedButton(
                onPressed: () => doLogin(),
                child: Text('Login'),
              )
            ],
          ),
        ));
  }
}
