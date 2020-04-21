export default  {
    Query:{
        allPatient:(_,args,{models}) => {
            return models.Patient.findAll({
            })
        }
    }
}