module.exports = function(app) {
    var products = require('../controllers/productController');
      // Create a new products
      app.post('/mongo/products', products.create);
 
      // Retrieve all products
      app.get('/mongo/products', products.findAll);
   
    //   // Retrieve a single products by Id
    //   app.get('/api/products/:productsId', products.findOne);
   
    //   // Update a products with Id
    //   app.put('/api/products/:productsId', products.update);
    
    // // Retrieve products Age
    //   app.get('/api/products/age/:age', products.findByAge);
   
    //   // Delete a products with Id
      app.delete('/api/products/:id', products.delete);
}