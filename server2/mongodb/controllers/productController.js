const Product = require('../models/productModel');

exports.create = (req,res) =>{
    const product = new Product({
        name : req.body.name,
        price : req.body.price,
        qty : req.body.qty,
        barcode : req.body.barcode
    });
    product.save()
    .then(data => {
        res.send(data);
    }).catch(err => {
        res.send(5000)
        .send({
            massage: err.massage
        })
    });
    // return res.json({
    //     result : product
    // });
};

// FETCH all Customers
exports.findAll = (req, res) => {
    Product.find()
    .then(products => {
        // res.json({status:'Success',result : products});
        return res.json(products);
    }).catch(err => {
        res.status(500).send({
            msg: err.message
        });
    });
};
 
 
// FIND a Customer
exports.findOne = (req, res) => {
    Product.findById(req.params.id)
    .then(customer => {
        if(!customer) {
            return res.status(404).json({
                msg: "Customer not found with id " + req.params.id
            });            
        }
        res.json(customer);
    }).catch(err => {
        if(err.kind === 'ObjectId') {
            return res.status(404).json({
                msg: "Customer not found with id " + req.params.id
            });                
        }
        return res.status(500).json({
            msg: "Error retrieving Customer with id " + req.params.id
        });
    });
};
 
// UPDATE a Customer
exports.update = (req, res) => {
    // Find customer and update it
    Product.findByIdAndUpdate(req.body._id, req.body, {new: true})
    .then(customer => {
        if(!customer) {
            return res.status(404).json({
                msg: "Customer not found with id " + req.params.id
            });
        }
        res.json(customer);
    }).catch(err => {
        if(err.kind === 'ObjectId') {
            return res.status(404).json({
                msg: "Customer not found with id " + req.params.id
            });                
        }
        return res.status(500).json({
            msg: "Error updating customer with id " + req.params.id
        });
    });
};
 
// DELETE a Customer
exports.delete = (req, res) => {
    // Product.findByIdAndRemove(req.params.id)
    // .then(customer => {
    //     if(!customer) {
    //         return res.status(404).json({
    //             msg: "Customer not found with id " + req.params.id
    //         });
    //     }
    //     res.json({msg: "Customer deleted successfully!"});
    // }).catch(err => {
    //     if(err.kind === 'ObjectId' || err.name === 'NotFound') {
    //         return res.status(404).json({
    //             msg: "Customer not found with id " + req.params.id
    //         });                
    //     }
    //     return res.status(500).json({
    //         msg: "Could not delete customer with id " + req.params.id
    //     });
    // });
    res.send(req);
};

