export const getDice = async (query) => {
    try {
        const dice = [1, 2, 3, 4, 5, 6]
        let resultAll = new Array();

        for(let i=0;i<query.num;i++){
            let  result= Math.floor(Math.random() * dice.length+1);
            resultAll.push(result);
            console.log(result);
            console.log(resultAll);
        }

        return {
            result: JSON.stringify(resultAll),
        };
    } catch (e) {
        throw Error("Error while getting Dice");
    }
};
