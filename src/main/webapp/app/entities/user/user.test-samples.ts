import { IUser } from './user.model';

export const sampleWithRequiredData: IUser = {
  id: 10202,
  login: 'H2mv$@rTu7FO',
};

export const sampleWithPartialData: IUser = {
  id: 10584,
  login: 'w6O',
};

export const sampleWithFullData: IUser = {
  id: 22014,
  login: '{!rl@f9',
};
Object.freeze(sampleWithRequiredData);
Object.freeze(sampleWithPartialData);
Object.freeze(sampleWithFullData);
