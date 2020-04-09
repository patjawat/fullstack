const express = require('express')
const router = express.Router();


const sticker = require('./sticker.service');

router.get('/',getAll)
router.post('/',create)

function getAll(req, res, next){
    sticker.getAll()
    .then((result) => {
            return res.json(result);
    })
}

function create(req, res, next){
    sticker.create(req.body).then((result) => {
        return res.json(result);
    })
}

module.exports = router;
