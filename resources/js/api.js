import config from "@/config";

const Base = {
    apiUrl: (version = config.DEAFULT_API_VERSION) => {
        let baseUrl = "";
        switch (config.ENV) {
            case "staging":
                baseUrl = config.API_URL_STAGING;
                break;
            case "production":
                baseUrl = config.API_URL_PROD;
                break;
            default:
                baseUrl = config.API_URL_LOCAL;
                break;
        }

        baseUrl += "/api/" + version;

        return baseUrl.replace(/\/$/, "");
    }
};

const API = {
    
    login: () => {
        return `${Base.apiUrl()}/login`;
    }
};

export default API;
