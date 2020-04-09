const express = require('express');
const router = express.Router();
const path = require('path');
const product = require('./products.service');

// Router Product
// router.post('product');

router.get('/', getAll);
router.get('/:id',getOne);
router.post('/',create);
router.put('/:id',update);
router.delete('/:id',deleted);

module.exports = router;


function getAll(req, res, next){
    product.getAll()
    .then((result) => {
            return res.json(result);
        })
    // return res.json({Hello: 'world'});
}


function getOne(req, res,next){
    product.getOne(req.params.id).then((result)=>{
        return res.json(result);
    })
};

function create(req, res,next){
    //     if (!req.files || Object.keys(req.files).length === 0) {
    //         return res.status(400).send('No files were uploaded.');
    //     }
  
    //     let sampleFile = req.files.file;
    //     sampleFile.mv('public/uploads/'+sampleFile.name, function(err) {
    //         if (err)
    //             return res.status(500).send(err);
    
    //     res.send('File uploaded!');

    //   });
 
    product.create(req.body).then((result)=>{
        return res.json(result);
        
    })
   
};


function update(req, res,next){
    product.update(req.params.id,req.body).then((result)=>{
        return res.json(result);
    })
    // return res.send(req.params.id);
};
function deleted(req, res,next){
    product.del(req.params.id).then((result)=>{
        return res.json(result);
    })
};
