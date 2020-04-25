export default  {
    Query:{
        allPatient:(_,args,{models}) => {
            return models.Patient.findAll({})
        }
    },
    Mutation:{
        createPatient: (_, args, { models }) => {
            return models.Patient.create(args)
        },
        deletePatient: (root, {id}, { models }, info) =>{
            return models.Patient.destroy({
                where: {
                    id: id
                }
            });
            // return models.Patient.findAll({})
        },
    }
}