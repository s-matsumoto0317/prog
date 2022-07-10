export const getOmikuji = async(query) =>{
    try{
        const omikuji = ["大吉", "中吉", "吉", "凶"];
        const result = omikuji[Math.floor(Math.random()*omikuji.length)];
        return {result: result};
    }catch(e){
        throw Error("Error while getting Omikuji");
    }
}