export default  {
    Query:{
        allPatient:(_,args,{models}) => {
            return models.Patient.findAll({
            })
        }
    },
    Mutation:{
        createPatient: (_, args, { models }) => {
            return models.Patient.create(args)
        },
    }
}