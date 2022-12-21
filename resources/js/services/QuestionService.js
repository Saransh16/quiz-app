import api from "../api.js";
import baseService from "./BaseService";

const QuestionService = {
    index() {
        return new Promise((res, rej) => {
            axios.get(api.fetchQuestions(), {
                headers: baseService.getAuthHeaders()
            })
                .then(response => {
                    return res(response.data);
                },
                error => {
                    baseService.handleError(error);
                    return rej(error.response.data);
                }
            );
        });
    }
};

export default QuestionService;
