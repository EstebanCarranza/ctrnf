class challengeDT 
{
    constructor(data)
    {   
        this.NitroPoints = data.NitroPoints;
        this.completado = data.completado;
        this.created_at = data.created_at;
        this.description = data.description;
        this.fechaFin = data.fechaFin;
        this.fechaInicio = data.fechaInicio;
        this.idChallenge = data.idChallenge;
        this.idChallengeDT = data.idChallengeDT;
        this.title = data.title;
        this.total = data.total;
        
    }

}
class tier
{
    constructor(data)
    {
        this.idTier = data.idTier;
        this.title  = data.title ;
        this.description = data.description;
        this.bronze  = data.bronze ;
        this.silver  = data.silver ;
        this.gold  = data.gold ;
        this.fechaInicio  = data.fechaInicio ;
        this.fechaFin  = data.fechaFin ;
        this.created_at  = data.created_at ;
        this.updated_at  = data.updated_at ;
    }
}