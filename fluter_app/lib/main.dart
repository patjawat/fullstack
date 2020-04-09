import 'package:flutter/material.dart';
import 'package:my_project_name/login.dart';
import 'package:my_project_name/login2.dart';

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'My App',
      home: LoginPage2()
    );
  }
}