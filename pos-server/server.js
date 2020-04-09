require('rootpath')();
const path = require('path');
const express = require('express');
const app = express();
const cors = require('cors');
const bodyParser = require('body-parser');
const jwt = require('_helpers/jwt');
const errorHandler = require('_helpers/error-handler');
const fileUpload = require('express-fileupload');
const { ApolloServer, gql } = require('apollo-server-express');
// const typeDefs = gql`
//   type Query {
//     hello: String
//   }
// `;
const books = [
  {
    title: 'Harry Potter and the Chamber of Secrets',
    author: 'J.K. Rowling',
  },
  {
    title: 'Jurassic Park',
    author: 'Michael Crichton',
  },
];
const typeDefs = gql`
  # Comments in GraphQL are defined with the hash (#) symbol.
  # This "Book" type can be used in other type declarations.
  type Book {
    title: String
    author: String
  }
  # The "Query" type is the root of all GraphQL queries.
  # (A "Mutation" type will be covered later on.)
  type Query {
    books: [Book]
  }
`;

const resolvers = {
  Query: {
    // hello: () => 'Hello world!',
    books: () => books,
  },
};

const server = new ApolloServer({ typeDefs, resolvers });

// app.use(express.static(path.join(__dirname, 'public')));
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
app.use(cors());
// default options
app.use(fileUpload());

// use JWT auth to secure the api
// app.use(jwt());

// api routes
app.post('/upload', function(req, res) {
    if (!req.files || Object.keys(req.files).length === 0) {
      return res.status(400).send('No files were uploaded.');
    }

    let sampleFile = req.files.file;
    sampleFile.mv('public/uploads/'+sampleFile.name, function(err) {
      if (err)
        return res.status(500).send(err);
  
      res.send('File uploaded!');
    });

  });

// app.post('/upload', function(req, res) {
//     // Uploaded files:
//     // console.log(req.files);
//     return res.send(req.files.file)
//   });

app.use('/users', require('./users/users.controller'));
app.use('/users-pg', require('./users_pg/users.controller'));
app.use('/products', require('./products/products.controller'));
app.use('/sticker', require('./sticker/sticker.controller'));

// global error handler
app.use(errorHandler);


// start server
// const port = process.env.NODE_ENV === 'production' ? (process.env.PORT || 80) : 4000;
// const server = app.listen(port, function () {
//     console.log('Server listening on port ' + port);
// });



server.applyMiddleware({ app });
app.listen({ port: 4000 }, () =>
  console.log('Now browse to http://localhost:4000' + server.graphqlPath)
);

