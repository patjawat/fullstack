import 'package:http/http.dart' as http;
import 'dart:io';
import 'dart:async';

class ApiPovider{
  ApiPovider();

  String endPoint = 'http://192.168.1.105:4000';
  Future<http.Response> doLogin(String username,String password) async {
    String _url = '$endPoint/users/authenticate';
    var body = {
      "username":username,
      "password":password
    };

    return http.post(_url,body:body);

  }

}